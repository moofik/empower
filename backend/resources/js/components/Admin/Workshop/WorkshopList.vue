<template>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">{{$t('Workshops')}}</h2>
            </div>

            <Search @search="updateData($event)"/>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <preloader v-if="loading" />

                    <table v-else class="min-w-full leading-normal table-fixed">
                        <WorkshopListHeader/>
                        <tbody>
                        <WorkshopListRow :key="index" v-for="(shop, index) in shops" :shop="shop" @delete="updateData"/>
                        </tbody>
                    </table>

                    <Pagination @paginate="updateData"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Search from "@/components/Admin/Shop/WorkshopSearch";
    import Pagination from "@/components/Admin/Widget/Pagination";
    import {mapState} from "vuex";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";
    import WorkshopListRow from "@/components/Admin/Shop/WorkshopListRow";
    import WorkshopListHeader from "@/components/Admin/Shop/WorkshopListHeader";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "WorkshopList",
        components: {
            Preloader,
            WorkshopListHeader,
            WorkshopListRow,
            Pagination,
            Search
        },
        mixins: [errorAwareWithPreloading],
        computed: {
            ...mapState({
                shops: state => state.adminShop.shops,
                searchWidgetStatus: state => state.search.searchWidgetStatus,
            })
        },
        methods: {
            async updateData(query = '') {
                await this.errorAwareStoreDispatch(Actions.FETCH_SHOPS, query);
            }
        },
        async mounted() {
            if (!this.searchWidgetStatus) {
                await this.errorAwareStoreDispatch(Actions.FETCH_SHOPS);
            }
        }
    }
</script>

<style scoped>

</style>
