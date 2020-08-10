<template>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">{{$t('Users')}}</h2>
            </div>

            <Search @search="updateData($event)"/>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <preloader v-if="loading" />

                    <table v-else class="min-w-full leading-normal">
                        <UserListHeader/>
                        <tbody>
                        <UserListRow :key="index" v-for="(admin, index) in admins" :user="admin" @delete="updateData"/>
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
                        <UserListActions/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Search from "@/components/Admin/User/UserSearch";
    import UserListHeader from "@/components/Admin/User/UserListHeader";
    import UserListRow from "@/components/Admin/User/UserListRow";
    import Pagination from "@/components/Admin/Widget/Pagination";
    import {mapState} from "vuex";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";
    import UserListActions from "@/components/Admin/User/UserListActions";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "UserList",
        components: {Preloader, UserListActions, Pagination, UserListRow, UserListHeader, Search},
        mixins: [errorAwareWithPreloading],
        computed: {
            ...mapState({
                admins: state => state.adminUsers.admins,
                searchWidgetStatus: state => state.search.searchWidgetStatus,
            })
        },
        methods: {
            async updateData(query = '') {
                console.log('Update data with query: ', query);
                await this.errorAwareStoreDispatch(Actions.FETCH_ADMIN_USERS, query);
            }
        },
        async mounted() {
            console.log('search widget status is: ', this.searchWidgetStatus);
            if (!this.searchWidgetStatus) {
                await this.errorAwareStoreDispatch(Actions.FETCH_ADMIN_USERS);
            }
        }
    }
</script>

<style scoped>

</style>
