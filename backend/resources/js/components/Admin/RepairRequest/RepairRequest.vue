<template>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col w-8/12 mx-auto">
        <error-widget v-if="hasError"/>
        <br v-if="hasError"/>
        <template v-if="repairRequest">
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                        {{$t('Customer name')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="name">
                        {{repairRequest.name}}
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="phone">
                        {{$t('Customer phone')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="phone">
                        {{repairRequest.phone}}
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                        {{$t('Customer email')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="email">
                        {{repairRequest.email}}
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="city">
                        {{$t('City')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="city">
                        {{repairRequest.city}}
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                           for="how_fast_time">
                        {{$t('Urgency')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="how_fast_time">
                        {{repairRequest.how_fast_time}}
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                           for="registration_number">
                        {{$t('Registration number')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="registration_number">
                        {{repairRequest.registration_number}}
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="drive">
                        {{$t('Drive')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="drive">
                        {{repairRequest.drive}}
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                           for="workshop_make">
                        {{$t('Car make')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="workshop_make">
                        {{repairRequest.workshop_make.name}}
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                           for="workshop_service">
                        {{$t('Service')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="workshop_service">
                        {{repairRequest.workshop_service.name}}
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                           for="workshop_spare_parts">
                        {{$t('Spare parts')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="workshop_spare_parts">
                        {{repairRequest.workshop_spare_parts.name}}
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                           for="description">
                        {{$t('Description')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="description">
                        {{repairRequest.description}}
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="status">
                        {{$t('Status')}}
                    </label>
                    <div
                        class="appearance-none block w-full bg-blue-100 text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        id="status">
                        {{status}}
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <button
                        type="button"
                        @click="$router.go(-1)"
                        class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Back')}}</span>
                    </button>
                    <button
                        @click="navigateToOwnerUser"
                        type="button"
                        class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Owning user')}}</span>
                    </button>
                    <button
                        @click="navigateToApplicantWorkshop"
                        v-if="hasApplicantWorkshop"
                        type="button"
                        class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Contractor workshop')}}</span>
                    </button>
                    <button
                        @click="navigateToOffers"
                        v-if="hasOffers"
                        type="button"
                        class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Offers')}}</span>
                    </button>
                    <button
                        type="button"
                        @click="deleteRequest"
                        class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded"
                        :class="{'bg-red-100': !isClosed, 'bg-red-600': isClosed}"
                    >
                        <span>{{$t('Delete repair request')}}</span>
                    </button>
                </div>
            </div>
        </template>

    </form>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";
    import Preloader from "@/components/Widget/Preloader";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import routeNames from "@/router/routeNames";
    import {mapState} from "vuex";

    export default {
        name: "AdminRepairRequest",
        components: {ErrorWidget, Preloader},
        mixins: [errorAwareWithPreloading],
        computed: {
            ...mapState({
                repairRequest: state => state.adminRepairRequest.currentRepairRequest
            }),

            isClosed() {
                return this.repairRequest && this.repairRequest.is_closed;
            },

            hasOffers() {
                return this.repairRequest && this.repairRequest.offer_been_made && !this.repairRequest.applicant_workshop;
            },

            hasApplicantWorkshop() {
                return this.repairRequest && this.repairRequest.applicant_workshop;
            },

            status() {
                if (!this.repairRequest) {
                    return '';
                }

                if (this.repairRequest.is_closed) {
                    return this.$t('Closed.');
                }

                if (this.repairRequest.is_incoming && !this.repairRequest.is_incoming_accepted) {
                    return this.$t('Manually submitted. Pending workshop response.')
                }

                if (this.repairRequest.is_incoming && this.repairRequest.is_incoming_accepted) {
                    return this.$t('Work in progress.');
                }

                if (!this.repairRequest.is_incoming && this.repairRequest.applicant_workshop) {
                    return this.$t('Work in progress.');
                }

                if (this.repairRequest.offer_been_made) {
                    return this.$t('Request has offers. Pending further customer actions.');
                }

                return this.$t('Request has no offers yet.');
            }
        },
        methods: {
            showModal () {
                this.$modal.show('dialog', {
                    title: 'Warning',
                    text: this.$t('It is not available to delete <b>CLOSED</b> repair requests.'),
                    buttons: [
                        {
                            title: 'Close'
                        }
                    ]
                });
            },

            async deleteRequest() {
                if (this.isClosed) {
                    this.showModal();
                    return;
                }

                await this.errorAwareStoreDispatch(Actions.DELETE_REPAIR_REQUEST, this.$route.params.id);
                await this.$router.push({name: routeNames.ROUTE_ADMIN_REPAIR_REQUESTS});
            },

            async navigateToOwnerUser() {
                try {
                    await this.$router.push({
                        name: routeNames.ROUTE_ADMIN_CUSTOMER_USERS_EDIT,
                        params: {id: this.repairRequest.owner_user.id}
                    })
                } catch (e) {
                    console.log(e);
                }
            },

            async navigateToApplicantWorkshop() {
                try {
                    await this.$router.push({
                        name: routeNames.ROUTE_ADMIN_SHOP_EDIT,
                        params: {id: this.repairRequest.applicant_workshop.id}
                    })
                } catch (e) {
                    console.log(e);
                }
            },

            async navigateToOffers() {
                try {
                    await this.$router.push({
                        name: routeNames.ROUTE_ADMIN_REPAIR_REQUEST_OFFERS,
                        params: {id: this.repairRequest.id}
                    })
                } catch (e) {
                    console.log(e);
                }
            },

        },
        async mounted() {
            if (this.$route.params.id) {
                const repairRequest = await this.errorAwareStoreDispatch(Actions.FETCH_REPAIR_REQUEST, this.$route.params.id);
            }
        }
    }
</script>

<style scoped>

</style>
