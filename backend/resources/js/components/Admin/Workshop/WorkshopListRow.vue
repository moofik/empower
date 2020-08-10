<template>
    <tr class="break-all">
        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
            <div class="flex items-center">
                <div class="ml-3">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{shop.full_name}}
                    </p>
                </div>
            </div>
        </td>

        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{shop.workshop_settings.workshop_name}}
            </p>
        </td>

        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{shop.email}}
            </p>
        </td>

        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{shop.workshop_settings.city}}
            </p>
        </td>

        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{shop.workshop_settings.workshop_phone}}
            </p>
        </td>

        <td class="px-2 py-5 border-b border-gray-200 bg-white text-sm">
            <button type="button" class="cursor-pointer bg-gray-700 hover:bg-gray-600
                                 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
                    @click="showShop"
            >
                {{$t('Show')}}
            </button>
            <button type="button" class="cursor-pointer bg-gray-700 hover:bg-gray-600
                                 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
               @click="editShop"
            >
                {{$t('Edit')}}
            </button>
            <button type="button" class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl
                                 px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
               @click="deleteShop"
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
        name: "WorkshopListRow",
        mixins: [errorAwareWithPreloading],
        props: {
            shop: {
                type: Object,
                required: true
            }
        },
        methods: {
            async showShop() {
                await this.$router.push({name: routeNames.ROUTE_WORKSHOP, params: {id: this.shop.id}});
            },

            async editShop() {
                await this.$router.push({name: routeNames.ROUTE_ADMIN_SHOP_EDIT, params: {id: this.shop.id}});
            },

            async deleteShop() {
                await this.errorAwareStoreDispatch(Actions.DELETE_SHOP, this.shop.id);
                this.$emit('delete');
            }
        }
    }
</script>

<style scoped>

</style>
