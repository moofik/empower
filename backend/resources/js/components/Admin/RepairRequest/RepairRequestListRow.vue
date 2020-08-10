<template>
    <tr>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <div class="flex items-center">
                <div class="ml-3">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{request.name}}
                    </p>
                </div>
            </div>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{request.phone}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{request.email}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{request.city}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{request.workshop_make.name}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{request.workshop_service.name}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{request.is_closed ? $t('Yes') : $t('No')}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <button type="button" class="cursor-pointer bg-gray-700 hover:bg-gray-600
                                 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
                    @click="showRepairRequest"
            >
                {{$t('Show')}}
            </button>
            <button type="button" class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl
                                 px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
               @click="deleteRepairRequest"
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
        name: "RepairRequestListRow",
        mixins: [errorAwareWithPreloading],
        props: {
            request: {
                type: Object,
                required: true
            }
        },
        methods: {
            async deleteRepairRequest() {
                await this.errorAwareStoreDispatch(Actions.DELETE_REPAIR_REQUEST, this.request.id);
                this.$emit('delete');
            },

            async showRepairRequest() {
                await this.$router.push({name: routeNames.ROUTE_ADMIN_REPAIR_REQUEST_SHOW, params: {id: this.request.id}});
            }
        }
    }
</script>

<style scoped>

</style>
