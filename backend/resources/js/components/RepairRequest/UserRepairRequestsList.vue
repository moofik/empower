<template>
    <div class="repair-request-list default-container mx-auto xs:mb-8 sm:mb-12">
        <h3>{{$t('My repair requests')}}</h3>
        <div class="default-table">
            <table class="w-full">
                <thead class="">
                    <tr class="text-center">
                        <td class='default-thead-tr' v-for="header in headers">{{header}}</td>
                    </tr>
                </thead>
                <tbody>
                <template v-for="request in userRequests">
                    <tr class="text-center cursor-pointer" @click.stop="navigateToRequest(request.id)">
                        <td>{{ request.created_at }}</td>
                        <td>{{ request.workshop_make.name }}</td>
                        <td>{{ request.how_fast_time }}</td>
                        <td>{{ request.workshop_service.name }}</td>
                        <td v-if="request.is_closed || request.applicant_workshop"></td>
                        <td v-else>{{ request.viewed }}</td>
                        <td v-if="request.is_incoming && !request.is_incoming_accepted" class="width-12p">
                            <span
                                  class="btn-transparent-default-nocursor btn-flat xs:my-1 sm:my-2">
                                {{ $t('Manually submitted') }}
                            </span>
                        </td>
                        <td v-else-if="request.is_closed || request.applicant_workshop"></td>
                        <td v-else>{{ request.offered }}</td>
                        <td class="width-12p">
                            <span v-if="request.is_closed"
                                  class="btn-transparent-default-nocursor btn-flat xs:my-1 sm:my-2">
                                {{ $t('Offer closed') }}
                            </span>
                            <span v-else-if="request.is_incoming && !request.is_incoming_accepted"
                                  class="btn-transparent-default-nocursor btn-flat xs:my-1 sm:my-2">
                                {{ $t('Pending workshop') }}
                            </span>
                            <span v-else-if="request.applicant_workshop"
                                  class="btn-transparent-default-nocursor btn-flat xs:my-1 sm:my-2">
                                {{ $t('Work In Progress') }}
                            </span>
                            <span v-else class="btn-orange-default btn-flat xs:my-1 sm:my-2"
                                  @click.stop="handleDeleteRequest(request.id)">
                                {{ $t('Delete request') }}
                            </span>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import Actions from '@/store/actions';
    import TableWidget from "@/components/Widget/TableWidget";
    import NestedTableWidget from "@/components/Widget/NestedTableWidget";
    import isAuthenticated from "@/services/mixin/isAuthenticated";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Routes from "@/router/routeNames";
    import roles from "@/services/mixin/roles";

    export default {
        name: "RepairOffers",
        components: {NestedTableWidget, TableWidget},
        data() {
            return {
                headers: [
                    this.$t('Added'),
                    this.$t('Make & Model'),
                    this.$t('Urgency'),
                    this.$t('Service'),
                    this.$t('Viewed'),
                    this.$t('Offers'),
                ],
                nestedHeaders: [
                    this.$t('City'),
                    this.$t('Driven'),
                    this.$t('Reg. No.'),
                    '',
                    '',
                    '',
                    this.$t('Description'),
                ],
                activeRows: []
            }
        },
        mixins: [isAuthenticated, errorAwareWithPreloading, roles],
        methods: {
            navigateToRequest(id) {
                console.log('push: navigate to request');
                this.$router.push({name: Routes.ROUTE_USER_REPAIR_REQUEST, params: {id}}).catch(err => {
                })
            },

            async handleDeleteRequest(id) {
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_DELETE, id);
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_USER_REQUESTS);
            },
        },
        computed: {
            ...mapState({
                userRequests: state => state.repairRequest.userRequests
            })
        },
        async mounted() {
            await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_USER_REQUESTS);
        },
        async created() {
            if (!this.isUser) {
                try {
                    await this.$router.push({name: Routes.ROUTE_HOME});
                } catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>
