<template>
    <div>
        <div v-if="!currentRequest.is_closed">
            <div class="xs:block sf-ui-bold text-lg xs:11/12 xs:mt-2 md:mt-2">
                {{ $t('Available actions') }}
            </div>

            <div v-if="currentRequest.applicant_workshop" class="btn-green-nomargin btn-flat" @click.stop="handleCloseOffer">
                {{$t('Close offer')}}
            </div>

            <div v-else class="btn-red-default btn-flat" type="button" @click.stop="handleCancelOffer">
                {{$t('Cancel offer')}}
            </div>
        </div>

        <modal :classes="['v--modal', 'modal-wrapper']" name="close-offer-confirmation">
            <div class="modal-default xs:p-8 md:p-8">
                <p>
                    {{ $t('Are you sure you want to close the offer? You should do this only if you either have \
                    successfully done repair job or have irreconcilable disagreements with a client.') }}
                </p>
                <div class="my-4">
                    <span class="btn-green-noborder btn-flat xs:my-1 sm:my-2" @click.stop="handleAcceptCloseOffer">
                        {{ $t('Yes') }}
                    </span>
                    <span class="btn-red-default btn-flat xs:my-1 sm:my-2" @click.stop="handleDenyCloseOffer">
                        {{ $t('No') }}
                    </span>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import Actions from "@/store/actions";
    import RouteNames from "@/router/routeNames";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        name: "OfferRepairRequestActions",
        mixins: [errorAwareWithPreloading],
        props: {
            currentRequest: {
                type: Object,
                required: true
            }
        },
        methods: {
            async handleDenyCloseOffer() {
                this.$modal.hide('close-offer-confirmation');
            },
            async handleAcceptCloseOffer() {
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_CLOSE_OFFER, this.$route.params.id);
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_FETCH, this.$route.params.id);
                this.$modal.hide('close-offer-confirmation');
            },
            async handleCloseOffer() {
                this.$modal.show('close-offer-confirmation');
            },
            async handleCancelOffer() {
                console.log('cancel offer');
                try {
                    await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_CANCEL_OFFER, this.$route.params.id);
                    await this.$router.push({name: RouteNames.ROUTE_OFFERED_REPAIR_REQUEST_LIST});
                } catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>

<style scoped>

</style>
