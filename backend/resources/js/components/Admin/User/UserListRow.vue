<template>
    <tr>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <div class="flex items-center">
                <!--                                    <div class="flex-shrink-0 w-10 h-10">-->
                <!--                                        <img class="w-full h-full rounded-full"-->
                <!--                                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"-->
                <!--                                             alt=""/>-->
                <!--                                    </div>-->
                <div class="ml-3">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{user.full_name}}
                    </p>
                </div>
            </div>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">{{$t('Moderator')}}</p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{user.email}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <button type="button" class="cursor-pointer bg-gray-700 hover:bg-gray-600
                                 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
               @click="editUser"
            >
                {{$t('Edit')}}
            </button>
            <button type="button" class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl
                                 px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
               @click="deleteUser"
            >
                {{$t('Delete')}}
            </button>
        </td>
    </tr>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";
    import routeNames from "@/router/routeNames";

    export default {
        name: "UserListRow",
        mixins: [errorAwareWithPreloading],
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        methods: {
            async editUser() {
                await this.$router.push({name: routeNames.ROUTE_ADMIN_USERS_EDIT, params: {id: this.user.id}});
            },

            async deleteUser() {
                await this.errorAwareStoreDispatch(Actions.DELETE_ADMIN_USER, this.user.id);
                this.$emit('delete');
            }
        }
    }
</script>

<style scoped>

</style>
