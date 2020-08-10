<template>
    <div class="w-11/12">
        <h3 v-if="offeredWorkshops.length > 0">{{$t('Repair request offers')}}:</h3>
        <preloader v-if="loading"/>

        <div v-else-if="isOfferClosed" class="workshop-shortcut flex flex-col">
            <h3 style="color: #52ac62;">
                {{$t('Offer is closed.')}}
                <span v-if="appliedWorkshop.can_be_rated">{{$t('Rate the service.')}}</span>
            </h3>
            <div class="flex flex-col items-start workshop-shortcut-title">
                <router-link
                    :to="{name: routeNames().ROUTE_WORKSHOP, params: {id: appliedWorkshop.id}}"
                    tag="div"
                    class="workshop-shortcut-title-inner"
                >
                    {{$t('Contractor workshop')}}: <strong>{{appliedWorkshop.workshop_settings.workshop_name}}</strong>
                </router-link>
                <star-rating
                    @rating-selected="setRating"
                    :rating="parseFloat(appliedWorkshop.rating)"
                    :increment="0.5"
                    :star-size="30"
                    :read-only="!appliedWorkshop.can_be_rated"
                    inactive-color="#fff"
                    active-color="#f1c101"
                    border-color="#f1c101"
                    :rounded-corners="true"
                    :border-width="2"
                    text-class="hidden rounded-b-sm rounded-t-sm rounded-l-sm rounded-r-sm"
                />
            </div>
        </div>

        <div v-else-if="appliedWorkshop" class="workshop-shortcut flex flex-col">
            <h3 v-if="currentRequest.is_incoming && !currentRequest.is_incoming_accepted" style="color: #000;">
                {{$t('Waiting contractor to accept or deny your request.')}}
            </h3>
            <h3 v-else style="color: #52ac62;">
                {{$t('Work in progress.')}}
            </h3>
            <div class="flex flex-row items-end workshop-shortcut-title">
                <router-link
                    :to="{name: routeNames().ROUTE_WORKSHOP, params: {id: appliedWorkshop.id}}"
                    tag="div"
                    class="workshop-shortcut-title-inner"
                >
                    {{$t('Contractor workshop')}}: <strong>{{appliedWorkshop.workshop_settings.workshop_name}}</strong>
                </router-link>
                <star-rating
                    :rating="parseFloat(appliedWorkshop.rating)"
                    :increment="0.5"
                    :star-size="30"
                    :read-only="true"
                    inactive-color="#fff"
                    active-color="#f1c101"
                    border-color="#f1c101"
                    :rounded-corners="true"
                    :border-width="2"
                    text-class="hidden rounded-b-sm rounded-t-sm rounded-l-sm rounded-r-sm"
                />
            </div>
        </div>

        <div v-else-if="offeredWorkshops.length > 0" :key="workshop.id" v-for="workshop in offeredWorkshops" class="workshop-shortcut flex flex-col">
            <div class="flex flex-row items-end workshop-shortcut-title">
                <router-link
                    :to="{name: routeNames().ROUTE_WORKSHOP, params: {id: workshop.id}}"
                    tag="div"
                    class="workshop-shortcut-title-inner"
                >
                    {{$t('Contractor workshop')}}: <strong>{{workshop.workshop_settings.workshop_name}}</strong>
                </router-link>
                <star-rating
                    :rating="parseFloat(workshop.rating)"
                    :increment="0.5"
                    :star-size="30"
                    :read-only="true"
                    inactive-color="#fff"
                    active-color="#f1c101"
                    border-color="#f1c101"
                    :rounded-corners="true"
                    :border-width="2"
                    text-class="hidden rounded-b-sm rounded-t-sm rounded-l-sm rounded-r-sm"
                />
            </div>

            <div>
                <button class="btn-green-default btn-flat" @click="acceptOffer(workshop.offer.id)">
                    {{ $t('Accept offer') }}
                    <font-awesome-icon icon="angle-right"/>
                </button>
                <button class="btn-red-default btn-flat" @click="declineOffer(workshop.offer.id)">
                    {{ $t('Decline offer') }}
                    <font-awesome-icon icon="angle-right"/>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapState} from 'vuex';
    import Actions from '@/store/actions';
    import StarRating from 'vue-star-rating'
    import routeNames from '@/services/mixin/routeNames';
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Preloader from "@/components/Widget/Preloader";
    import Mutations from "@/store/mutations";
    import Getter from "@/store/getters";

    export default {
        name: "RepairRequestOffers",
        mixins: [routeNames, errorAwareWithPreloading],
        props: {
            currentRequest: {
                type: Object,
                required: true
            }
        },
        methods: {
            async setRating(rating) {
                const ratingDto = {
                    id: this.$route.params.id,
                    rating: rating
                };

                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_WORKSHOP_RATE, ratingDto);
                this.$store.commit(Mutations.REPAIR_REQUEST_SAVE_APPLIED_WORKSHOP, null);
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_APPLIED_WORKSHOP, {id: this.$route.params.id});
            },
            async acceptOffer(id) {
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_ACCEPT_OFFER, {id});
                this.$store.commit(Mutations.REPAIR_REQUEST_SAVE_APPLIED_WORKSHOP, null);
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_APPLIED_WORKSHOP, {id: this.$route.params.id});
            },
            async declineOffer(id) {
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_DECLINE_OFFER, {id});
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_OFFERED_WORKSHOPS, {id: this.$route.params.id});
            }
        },
        components: {
            Preloader,
            StarRating
        },
        computed: {
            ...mapState({
                offeredWorkshops: state => state.repairRequest.offeredWorkshops,
                appliedWorkshop: state => state.repairRequest.appliedWorkshop
            }),
            ...mapGetters({
                isOfferClosed: Getter.IS_OFFER_CLOSED
            })
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_APPLIED_WORKSHOP, {id: this.$route.params.id});

            if (!this.appliedWorkshop) {
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_OFFERED_WORKSHOPS, {id: this.$route.params.id});
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
            font-size: 18px;
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

