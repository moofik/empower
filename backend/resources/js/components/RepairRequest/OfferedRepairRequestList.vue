<template>
    <div class="repair-request-list default-container mx-auto xs:mb-8 sm:mb-12">
        <h3>{{$t('My offers')}}</h3>
        <preloader v-if="loading"/>
        <div v-else class="default-table">
            <table class="w-full">
                <thead class="">
                <tr class="text-center">
                    <td class='default-thead-tr' v-for="header in headers">{{header}}</td>
                </tr>
                </thead>
                <template v-for="request in repairRequests">
                    <repair-request-list-row
                        :request="request" :nested-headers="nestedHeaders"
                        @update="updateRequests" @toRequest="navigateToRequest($event)">
                        <template v-slot:action>

                            <span v-if="request.is_closed"
                                  class="btn-transparent-default-nocursor btn-flat xs:my-1 sm:my-2">
                                 {{ $t('Offer closed') }}
                           </span>

                            <span v-else-if="request.applicant_workshop"
                                  class="btn-transparent-default-nocursor btn-flat xs:my-1 sm:my-2">
                                 {{ $t('Work In Progress') }}
                           </span>

                            <span v-else-if="request.offer_been_made"
                                  class="btn-red-default btn-flat xs:my-1 sm:my-2"
                                  @click.stop="handleCancelOffer(request)">
                                  {{ $t('Cancel offer') }}
                            </span>

                        </template>
                    </repair-request-list-row>
                </template>
            </table>
        </div>
        <paginate
            v-if="paginationMetadata"
            v-model="currentPage"
            :pageCount="paginationMetadata.last_page"
            :containerClass="'pagination'"
            :clickHandler="paginationCallback">
        </paginate>
    </div>
</template>

<script>
    import Actions from '@/store/actions';
    import TableWidget from "@/components/Widget/TableWidget";
    import NestedTableWidget from "@/components/Widget/NestedTableWidget";
    import Preloader from "@/components/Widget/Preloader";
    import RepairRequestListRow from "@/components/ItemRequest/RepairRequestListRow";
    import Routes from "@/router/routeNames";
    import repairRequestListGenerics from "@/components/ItemRequest/repairRequestListGenerics";
    import roles from "@/services/mixin/roles";

    export default {
        name: "OfferedRepairRequestList",
        components: {RepairRequestListRow, Preloader, NestedTableWidget, TableWidget},
        mixins: [repairRequestListGenerics, roles],
        methods: {
            paginationCallback: function (page) {
                this.preparePagination(page);
                this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_WORKSHOP_OFFERS, page);
            },
            async updateRequests() {
                await this.errorAwareStoreDispatch(Actions.REPAIR_REQUESTS_FETCH_WORKSHOP_OFFERS, this.currentPage);
            },
            navigateToRequest(request) {
                this.$router
                    .push({name: Routes.ROUTE_OFFERED_REPAIR_REQUEST, params: {id: request.id}})
                    .catch(err => {});
            },
            async handleCancelOffer(request) {
                try {
                    await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_CANCEL_OFFER, request.id);
                    await this.updateRequests();
                } catch (e) {
                    console.log(e);
                }
            }
        },
        created() {
            if (!this.isWorkshop && !this.isAdmin && !this.isModerator) {
                this.$router.push({name: Routes.ROUTE_HOME});
            }
        }
    }
</script>

