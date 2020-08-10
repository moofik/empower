<template>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">{{$t('Customers')}}</h2>
            </div>

            <Search @search="updateData($event)"/>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <preloader v-if="loading" />

                    <table v-else class="min-w-full leading-normal">
                        <CustomerListHeader/>
                        <tbody>
                        <CustomerListRow :key="index" v-for="(customer, index) in customers" :user="customer" @delete="updateData"/>
                        </tbody>
                    </table>

                    <Pagination @paginate="updateData"/>
                </div>
                <br/>
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">{{$t('Available actions')}}</h2>
                </div>
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden px-8 py-3">
                    <div>
                        <CustomerListActions/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Search from "@/components/Admin/Customer/CustomerSearch";
    import CustomerListHeader from "@/components/Admin/Customer/CustomerListHeader";
    import CustomerListRow from "@/components/Admin/Customer/CustomerListRow";
    import Pagination from "@/components/Admin/Widget/Pagination";
    import {mapState} from "vuex";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";
    import CustomerListActions from "@/components/Admin/Customer/CustomerListActions";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "CustomerList",
        components: {Preloader, CustomerListActions, Pagination, CustomerListRow, CustomerListHeader, Search},
        mixins: [errorAwareWithPreloading],
        computed: {
            ...mapState({
                customers: state => state.adminCustomer.customers,
                searchWidgetStatus: state => state.search.searchWidgetStatus,
            })
        },
        methods: {
            async updateData(query = '') {
                await this.errorAwareStoreDispatch(Actions.FETCH_CUSTOMER_USERS, query);
            }
        },
        async mounted() {
            if (!this.searchWidgetStatus) {
                await this.errorAwareStoreDispatch(Actions.FETCH_CUSTOMER_USERS);
            }
        }
    }
</script>

<style scoped>

</style>
