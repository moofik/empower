<template>
    <div class="w-11/12">
        <preloader v-if="loading" />
        <div v-else class="workshop-shortcut flex flex-col">
            <div class="flex flex-row items-end workshop-shortcut-title">
                <strong>{{workshop.title}}</strong>
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
                    text-class="rounded-b-sm rounded-t-sm rounded-l-sm rounded-r-sm"
                />
            </div>
            <p v-if="workshop.workshop_makes.length" class="workshop-shortcut-location">
                {{$t('Specializing in')}}:
                <span v-for="make in workshop.workshop_makes" class="tag">{{make.name}}</span>
            </p>
            <p class="workshop-shortcut-location">
                {{$t('Location')}}:
                <a href="#">{{workshop.workshop_settings.city}}</a>
            </p>
            <div>
                <button v-if="isUser" class="btn-green-default btn-flat hover-darkgreen" @click="openQuoteRequestForm">
                    {{ $t('Submit a repair request') }}
                    <font-awesome-icon icon="angle-right"/>
                </button>

                <button v-else-if="isGuest" class="btn-green-default btn-flat hover-darkgreen" @click="$router.push({name: routeNames().ROUTE_USER_REGISTER})">
                    {{ $t('Submit a repair request') }}
                    <font-awesome-icon icon="angle-right"/>
                </button>
            </div>
        </div>
        <h3 class="workshop-default-title">{{ $t('Information') }}</h3>
        <tab-menu-widget v-if="workshop" :workshop="workshop"/>
        <submit-repair-request-form
            v-if="workshop && isUser"
            @close="closeQuoteRequestForm"
            :is-active="isQuoteRequestFormActive"
            :workshop-id="workshopId"
            :makes="workshop.workshop_makes"
            :services="workshopMainServices"
            :spare-parts="workshop.workshop_spare_parts"
        />
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import Actions from '@/store/actions';
    import StarRating from 'vue-star-rating'
    import TabMenuWidget from '@/components/Shop/TabMenuWidget';
    import routeNames from '@/services/mixin/routeNames';
    import TableWidget from '@/components/Widget/TableWidget'
    import ListWidget from '@/components/Widget/ListWidget';
    import SubmitRepairRequestForm from "@/components/Shop/SubmitRepairRequestForm";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Preloader from "@/components/Widget/Preloader";
    import roles from "@/services/mixin/roles";

    export default {
        name: "DetailedWorkshop",
        data() {
            return {
                isQuoteRequestFormActive: false
            }
        },
        methods: {
            openQuoteRequestForm() {
                this.isQuoteRequestFormActive = true;
            },
            closeQuoteRequestForm() {
                this.isQuoteRequestFormActive = false;
            },
        },
        mixins: [routeNames, errorAwareWithPreloading, roles],
        props: {
            workshopId: {
                type: Number,
                required: true
            }
        },
        components: {
            Preloader,
            TableWidget,
            StarRating,
            TabMenuWidget,
            ListWidget,
            SubmitRepairRequestForm
        },
        computed: {
            ...mapState({
                workshop: state => state.workshop.currentWorkshop
            }),
            workshopMainServices() {
                return this.workshop.workshop_services.filter(service => {
                    return !service.is_additional;
                })
            }
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.WORKSHOP_FETCH, {id: this.workshopId});
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

    .workshop-information {
        font-family: "SF UI Font Regular", sans-serif;
        margin: 10px 0 10px 100px;
        font-size: 14px;
        line-height: 1.4;
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
