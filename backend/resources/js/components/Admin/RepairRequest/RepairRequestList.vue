<template>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">{{$t('Repair requests')}}</h2>
            </div>

            <Search @search="updateData($event)"/>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <preloader v-if="loading" />

                    <table v-else class="min-w-full leading-normal">
                        <RepairRequestListHeader/>
                        <tbody>
                        <RepairRequestListRow :key="index" v-for="(repairRequest, index) in repairRequests" :request="repairRequest" @delete="updateData"/>
                        </tbody>
                    </table>

                    <Pagination @paginate="updateData"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Search from "@/components/Admin/ItemRequest/RepairRequestSearch";
    import RepairRequestListHeader from "@/components/Admin/ItemRequest/RepairRequestListHeader";
    import RepairRequestListRow from "@/components/Admin/ItemRequest/RepairRequestListRow";
    import Pagination from "@/components/Admin/Widget/Pagination";
    import {mapState} from "vuex";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "RepairRequestList",
        components: {Preloader, Pagination, RepairRequestListRow, RepairRequestListHeader, Search},
        mixins: [errorAwareWithPreloading],
        computed: {
            ...mapState({
                repairRequests: state => state.adminRepairRequest.repairRequests,
                searchWidgetStatus: state => state.search.searchWidgetStatus,
            })
        },
        methods: {
            async updateData(query = '') {
                await this.errorAwareStoreDispatch(Actions.FETCH_REPAIR_REQUESTS, query);
            }
        },
        async mounted() {
            if (!this.searchWidgetStatus) {
                await this.errorAwareStoreDispatch(Actions.FETCH_REPAIR_REQUESTS);
            }
        }
    }
</script>

<style scoped>

</style>
