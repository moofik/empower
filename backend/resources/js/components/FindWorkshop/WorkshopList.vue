<template>
    <div class="w-11/12">
        <h3 v-if="workshopShortcuts && paginationMetadata" class="workshop-default-title">
            Found {{paginationMetadata.total}} workshops total
        </h3>
        <preloader v-if="loading"/>
        <div v-else :key="workshop.id" v-for="workshop in workshopShortcuts" class="workshop-shortcut flex flex-col">
            <div class="flex flex-row items-end workshop-shortcut-title">
                <router-link
                        :to="{name: routeNames().ROUTE_WORKSHOP, params: {id: workshop.id}}"
                        tag="div"
                        class="workshop-shortcut-title-inner"
                >
                    <strong>{{workshop.workshop_settings.workshop_name}}</strong>
                </router-link>
                <star-rating
                        :rating="parseFloat(workshop.rating)"
                        :increment="0.5"
                        :star-size="16"
                        :read-only="true"
                        inactive-color="#fff"
                        active-color="#f1c101"
                        border-color="#f1c101"
                        :rounded-corners="true"
                        :border-width="2"
                        text-class="hidden rounded-b-sm rounded-t-sm rounded-l-sm rounded-r-sm"
                />
            </div>
            <p v-if="workshop.workshop_makes && workshop.workshop_makes.length" class="workshop-shortcut-location">
                {{$t('Specializing in')}}: <span v-for="make in workshop.workshop_makes"
                                                 class="tag">{{make.name}}</span>
            </p>
            <p class="workshop-shortcut-location">
                {{$t('Location')}}:
                <a href="#">{{workshop.workshop_settings.city}}</a>
            </p>
            <div>
                <button v-if="isGuest" class="btn-green-default btn-flat hover-darkgreen" @click="$router.push({name: routeNames().ROUTE_USER_REGISTER})">
                    {{ $t('Submit a repair request') }}
                    <font-awesome-icon icon="angle-right"/>
                </button>
                <button v-else-if="!isWorkshop" type="button" class="btn-orange-default btn-flat" @click="openQuoteRequestForm(workshop)">
                    {{ $t('Submit a repair request') }}
                    <font-awesome-icon icon="angle-right"/>
                </button>

                <router-link
                        tag="a"
                        :to="{name: routeNames().ROUTE_WORKSHOP, params: {id: workshop.id}}"
                        class="btn-white-default btn-flat"
                >
                    {{ $t('Details') }}
                    <font-awesome-icon icon="angle-right"/>
                </router-link>
            </div>
        </div>
        <submit-repair-request-form
                v-if="submitWorkshopMainServices.length > 0"
                @close="closeQuoteRequestForm"
                :is-active="isQuoteRequestFormActive"
                :workshop-id="submitWorkshopId"
                :makes="submitWorkshopMakes"
                :services="submitWorkshopMainServices"
                :spare-parts="submitWorkshopSpareParts"
        />
        <paginate
                v-if="paginationMetadata"
                v-model="currentPage"
                :pageCount="paginationMetadata.last_page"
                :containerClass="'pagination'"
                :clickHandler="paginationCallback">
        </paginate>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import StarRating from 'vue-star-rating'
    import routeNames from '@/services/mixin/routeNames';
    import SubmitRepairRequestForm from "@/components/Shop/SubmitRepairRequestForm";
    import Preloader from "@/components/Widget/Preloader";
    import roles from "@/services/mixin/roles";

    export default {
        name: "WorkshopList",
        mixins: [routeNames, roles],
        props: {
            loading: {
                type: Boolean,
                required: true
            }
        },
        data() {
            return {
                isQuoteRequestFormActive: false,
                submitWorkshopId: -1,
                submitWorkshopMakes: [],
                submitWorkshopServices: [],
                submitWorkshopSpareParts: []
            }
        },
        methods: {
            async preparePagination(page = 1, queryParams = {}) {
                console.log('push: prepare pagination');
                await this.$router.push({
                    name: this.$route.name,
                    query: Object.assign({}, queryParams, {page, perPage: 5})
                });

                window.scrollTo(0, 0);
            },
            openQuoteRequestForm(workshop) {
                this.submitWorkshopId = workshop.id;
                this.submitWorkshopMakes = workshop.workshop_makes;
                this.submitWorkshopServices = workshop.workshop_services;
                this.submitWorkshopSpareParts = workshop.workshop_spare_parts;
                this.isQuoteRequestFormActive = true;
            },
            closeQuoteRequestForm() {
                this.isQuoteRequestFormActive = false;
                this.submitWorkshopId = -1;
                this.submitWorkshopMakes = [];
                this.submitWorkshopServices = [];
                this.submitWorkshopSpareParts = [];
            },
            paginationCallback: function (page) {
                let query = this.$route.query;
                delete query['page'];
                this.preparePagination(page, query);

                let queryString = `?page=${page}&`;

                for (let key in query) {
                    queryString += (key + '=' + query[key] + '&');
                }

                this.$emit('paginate', queryString.slice(0, -1));
            }
        },
        components: {
            Preloader,
            StarRating,
            SubmitRepairRequestForm
        },
        computed: {
            currentPage: {
                get() {
                    let page = this.$route.query.page;

                    if (!page) {
                        page = 1;
                    }

                    return parseInt(page);
                },

                set() {
                }
            },
            ...mapState({
                paginationMetadata: state => state.pagination.metadata,
                workshopShortcuts: state => state.workshop.workshops
            }),
            submitWorkshopMainServices() {
                if (!this.submitWorkshopServices) {
                    return [];
                }

                return this.submitWorkshopServices.filter(service => {
                    return !service.is_additional;
                })
            }
        }
    }
</script>

<style scoped lang="scss">
    .tag {
        display: inline-block;
        border-radius: 3px;
        background: #cdd4ca;
        padding: 3px 5px;
        margin: 1px 2px;
    }

    .workshop-shortcut {
        background: #fff;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .35);
        color: #666;
        margin-bottom: 20px;

        .workshop-shortcut-title {
            margin-bottom: 10px;
        }

        .workshop-shortcut-title-inner {
            margin-right: 20px;
            font-family: "SF UT Text Bold", sans-serif;
            outline: none;
            text-decoration: underline;
            color: #153e5c;
            cursor: pointer;
            font-size: 14px;
        }

        .workshop-shortcut-location {
            font-family: "SF UI Font Regular", sans-serif;
            font-size: 14px;
            margin: 0 0 10px 0;
            color: #666;

            a {
                outline: none;
                text-decoration: underline;
                color: #153e5c;
                cursor: pointer;
            }
        }
    }
</style>
