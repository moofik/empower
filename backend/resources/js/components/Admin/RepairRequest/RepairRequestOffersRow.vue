<template>
    <tr>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <div class="flex items-center">
                <div class="ml-3">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{offer.repair_request_id}}
                    </p>
                </div>
            </div>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{offer.repair_request.owner_user.id}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{offer.repair_request.owner_user.email}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{offer.workshop.id}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap">
                {{offer.workshop.email}}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <button type="button" class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl
                                 px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
               @click="deleteOffer"
            >
                {{$t('Delete')}}
            </button>
        </td>
    </tr>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";

    export default {
        name: "RepairRequestsOffersRow",
        mixins: [errorAwareWithPreloading],
        props: {
            offer: {
                type: Object,
                required: true
            }
        },
        methods: {
            async deleteOffer() {
                await this.errorAwareStoreDispatch(Actions.DELETE_REPAIR_REQUEST_OFFER, this.offer.id);
                this.$emit('delete');
            }
        }
    }
</script>

<style scoped>

</style>
