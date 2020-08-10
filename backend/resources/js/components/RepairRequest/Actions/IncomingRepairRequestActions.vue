<template>
    <div v-else-if="currentRequest.applicant_workshop">
        <template v-if="currentRequest.is_incoming && !currentRequest.is_incoming_accepted">
            <div class="xs:block sf-ui-bold text-lg xs:11/12 xs:mt-2 md:mt-2">
                {{ $t('Available actions') }}
            </div>
            <span class="btn-green-default btn-flat" @click.stop="acceptIncomingRequest">
                {{ $t('Accept request') }}
            </span>
            <span class="btn-red-default btn-flat" @click.stop="denyIncomingRequest">
                {{ $t('Deny request') }}
            </span>
        </template>
    </div>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/actions";
    import RouteNames from "@/router/routeNames";

    export default {
        name: "IncomingRepairRequestActions",
        mixins: [errorAwareWithPreloading],
        props: {
            currentRequest: {
                type: Object,
                required: true
            }
        },
        methods: {
            async acceptIncomingRequest() {
                console.log('push: accept incoming request');
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_ACCEPT_SPECIFIC, this.$route.params.id);
                this.$router
                    .push({name: RouteNames.ROUTE_OFFERED_REPAIR_REQUEST, params: {id: this.$route.params.id}})
                    .catch(err => {});
            },
            async denyIncomingRequest() {
                console.log('push: deny incoming request');
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_DENY_SPECIFIC, this.$route.params.id);
                this.$router
                    .push({name: RouteNames.ROUTE_INCOMING_REPAIR_REQUEST_LIST})
                    .catch(err => {});
            }
        }
    }
</script>

<style scoped>

</style>
