<template>
    <div class="default-container ml-auto mr-auto mt-4 mb-4">
        <h3>{{$t('Repair request')}} #{{this.$route.params.id}}</h3>
        <preloader v-if="loading || currentRequest === null"></preloader>
        <section v-else
                 class="mt-0 mb-0 xs:block xs:flex-col md:flex md:flex-row lg:flex-row xl:flex-row">
            <div class="mt-0 mb-0 xs:w-full md:w-11/12">
                <form class="md:pl-0 xs:p-2">
                    <div class="form-group-row xs:block">
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('E-mail')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.email}}
                            </div>
                        </div>
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Phone')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.phone}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group-row xs:block">
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Name')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.name}}
                            </div>
                        </div>
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('City')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.city}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group-row xs:block">
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Car make')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.workshop_make.name}}
                            </div>
                        </div>
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Service')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.workshop_service.name}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group-row xs:block">
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Urgency')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.how_fast_time}}
                            </div>
                        </div>
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Drive')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.drive}} {{$t('Miles')}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group-row xs:block">
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Used spare parts')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.workshop_spare_parts.name}}
                            </div>
                        </div>
                        <div class="form-unit xs:block xs:flex-col xs:w-2/5 md:w-2/5">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Registration number')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.registration_number}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group-row xs:block">
                        <div class="form-unit xs:block xs:flex-col xs:w-10/12 md:w-10/12">
                            <div class="xs:block sf-ui-bold text-lg xs:11/12">
                                {{$t('Description')}}
                            </div>

                            <div class="input-style-text-noborder xs:11/12 md:11/12">
                                {{currentRequest.description}}
                            </div>
                        </div>
                    </div>
                </form>

                <slot name="statuses"></slot>
                <slot name="actions"></slot>
                <slot name="widgets"></slot>
            </div>
        </section>
    </div>
</template>

<script>
    import isAuthenticated from "@/services/mixin/isAuthenticated";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import roles from "@/services/mixin/roles";
    import Preloader from "@/components/Widget/Preloader";
    import RepairRequestOffers from "@/components/ItemRequest/Widgets/RepairRequestOffers";

    export default {
        name: "RepairRequest",
        components: {Preloader, RepairRequestOffers},
        props: {
            currentRequest: {
                type: Object,
                required: true
            }
        },
        mixins: [isAuthenticated, errorAwareWithPreloading, roles]
    }
</script>

<style lang="scss">
    .w-96-p {
        width: 96%;
    }

    .repair-request-container {
        padding: 60px 0;

        .inner-container {
            max-width: 1300px;

            .title-section {
                font-size: 13px;
                line-height: 1.4;
                font-family: "SF UI Text Bold", sans-serif;
                font-weight: normal;
                color: #f2be54;

                h1 {
                    margin-top: 0;
                }

                .main-title {
                    color: white;
                    max-width: 180px;
                    word-break: break-word;
                }

                .mini-title {
                    max-width: 340px;
                    word-break: break-word;
                }
            }

            .form-notice {
                margin-right: 4%;
                color: #999;
            }
        }
    }
</style>
