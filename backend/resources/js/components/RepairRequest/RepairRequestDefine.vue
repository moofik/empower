<template>
    <repair-request v-if="currentRequest" :current-request="currentRequest">
        <template v-slot:statuses>
            <component :is="statuses" :current-request="currentRequest" />
        </template>
        <template v-slot:actions>
            <component :is="actions" :current-request="currentRequest" />
        </template>
        <template v-slot:widgets>
            <component :is="widgets" :current-request="currentRequest" />
        </template>
    </repair-request>
</template>

<script>
    import RepairRequest from "@/components/ItemRequest/ItemRequest";
    import routeNames from "@/router/routeNames";
    import Actions from "@/store/actions";
    import {mapState} from "vuex";
    import HubRepairRequestActions from "@/components/ItemRequest/Actions/HubRepairRequestActions";
    import IncomingRepairRequestActions from "@/components/ItemRequest/Actions/IncomingRepairRequestActions";
    import OfferRepairRequestActions from "@/components/ItemRequest/Actions/OfferRepairRequestActions";
    import HubRepairRequestStatuses from "@/components/ItemRequest/Statuses/HubRepairRequestStatuses";
    import IncomingRepairRequestStatuses from "@/components/ItemRequest/Statuses/IncomingRepairRequestStatuses";
    import OfferRepairRequestStatuses from "@/components/ItemRequest/Statuses/OfferRepairRequestStatuses";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import RepairRequestOffers from "@/components/ItemRequest/Widgets/RepairRequestOffers";

    export default {
        name: "RepairRequestDefine",
        components: {
            RepairRequest,
            HubRepairRequestActions,
            IncomingRepairRequestActions,
            OfferRepairRequestActions,
            HubRepairRequestStatuses,
            IncomingRepairRequestStatuses,
            OfferRepairRequestStatuses
        },
        mixins: [errorAwareWithPreloading],
        async mounted() {
            await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_FETCH, this.$route.params.id);
        },
        computed: {
            ...mapState({
                currentRequest: state => state.repairRequest.currentRequest
            }),
            statuses() {
                switch (this.$route.name) {
                    case routeNames.ROUTE_OFFERED_REPAIR_REQUEST:
                        return OfferRepairRequestStatuses;
                    case routeNames.ROUTE_HUB_REPAIR_REQUEST:
                        return HubRepairRequestStatuses;
                    case routeNames.ROUTE_INCOMING_REPAIR_REQUEST:
                        return IncomingRepairRequestStatuses;
                    default:
                        return null;
                }
            },
            actions() {
                switch (this.$route.name) {
                    case routeNames.ROUTE_OFFERED_REPAIR_REQUEST:
                        return OfferRepairRequestActions;
                    case routeNames.ROUTE_HUB_REPAIR_REQUEST:
                        return HubRepairRequestActions;
                    case routeNames.ROUTE_INCOMING_REPAIR_REQUEST:
                        return IncomingRepairRequestActions;
                    default:
                        return null;
                }
            },
            widgets() {
                switch (this.$route.name) {
                    case routeNames.ROUTE_USER_REPAIR_REQUEST:
                        return RepairRequestOffers;
                    default:
                        return null;
                }
            }
        },
    }
</script>

<style scoped>

</style>
