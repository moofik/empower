<template>
    <div class="request-quote-container ml-auto mr-auto mt-0 mb-0">
        <section
            class="inner-container ml-auto mr-auto mt-0 mb-0 md:px-20 xs:block xs:flex-col md:flex md:flex-row lg:flex-row xl:flex-row">
            <div class="title-section flex xs:w-full xs:p-0 lg:w-1/2 items-baseline justify-center ">
                <h1>
                    <span class="main-title block xs:max-w-full xs:w-full">{{ $t("Problems with your car?") }}</span>
                    <span
                        class="mini-title block xs:max-w-full xs:w-full">{{ $t('Submit a repair request and tender for your service') }}</span>
                </h1>
            </div>
            <div class="ml-auto mr-auto mt-0 mb-0 lg:w-1/2">
                <form class="md:pl-0 xs:p-2" @submit.prevent="submitQuote">
                    <div class="form-unit xs:w-full">
                        <label>
                            <select name="carMake" class="input-type-select xs:w-full" v-model="makeId" required>
                                <option disabled selected>Make</option>
                                <option v-for="make in makes" :value="make.id">{{make.name}}</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group-row xs:block">
                        <div class="form-unit xs:w-full">
                            <label>
                                <select name="repairCategory" class="input-type-select xs:w-full" v-model="serviceId" required>
                                    <option disabled selected>{{$t('Please select a category')}}</option>
                                    <option v-for="service in services" :value="service.id">{{$t(service.name)}}</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-unit xs:w-full">
                            <label>
                                <select name="how_fast_time" class="input-type-select xs:w-full" v-model="howFastTime" required>
                                    <option disabled selected>{{$t('How fast do you need a service')}}</option>
                                    <option value="As soon as possible">{{$t('As soon as possible')}}</option>
                                    <option value="1 day">{{$t('1 day')}}</option>
                                    <option value="1-3 days">{{$t('1-3 days')}}</option>
                                    <option value="1 week">{{$t('1 week')}}</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-unit xs:w-full">
                            <label>
                                <input type="text" name="drive" :placeholder="$t('Drive')"
                                       class="input-type-text xs:w-full" v-model="drive" required/>
                            </label>
                        </div>
                        <div class="form-unit xs:w-full">
                            <label>
                                <input type="text" name="registrationNumber" :placeholder="$t('Registration number')"
                                       class="input-type-text xs:w-full" v-model="registrationNumber" required/>
                            </label>
                        </div>
                    </div>

                    <!-- Another section -->

                    <div class="form-unit xs:w-full">
                        <label>
                            <select name="usedParts" class="input-type-select xs:w-full" v-model="sparePartId">
                                <option disabled selected>{{$t('Used spare parts')}}</option>
                                <option v-for="part in spareParts" :value="part.id">{{$t(part.name)}}</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group-row">
                        <div class="form-unit xs:w-full">
                            <label>
                                <input type="text" name="city" :placeholder="$t('City')"
                                       class="input-type-text xs:w-full" v-model="city" required/>
                            </label>
                        </div>
                        <div class="form-unit xs:w-full">
                            <label>
                                <input type="text" name="name" :placeholder="$t('Name')"
                                       class="input-type-text xs:w-full" v-model="name" required/>
                            </label>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-unit xs:w-full">
                            <label>
                                <input type="text" name="phone" :placeholder="$t('Phone')"
                                       class="input-type-text xs:w-full" v-model="phone" required/>
                            </label>
                        </div>
                        <div class="form-unit xs:w-full">
                            <label>
                                <input type="email" name="email" :placeholder="$t('Email address')"
                                       class="input-type-text xs:w-full" v-model="email" required/>
                            </label>
                        </div>
                    </div>
                    <div class="form-big-unit">
                            <textarea type="text" name="comment" id="comment" :placeholder="$t('Describe the problem')"
                                      class="input-type-text xs:w-full md:w-24/25"
                                      autocomplete="comment" v-model="description" required></textarea>
                    </div>
                    <button class="btn-orange-default btn-flat" type="button" @click="submitRepairRequest">{{$t('Send')}}></button>
                </form>

                <p class="text-right form-notice">{{$t('All fields are required.')}}</p>
            </div>
        </section>
    </div>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import roles from "@/services/mixin/roles";
    import routeNames from "@/services/mixin/routeNames";
    import {mapState} from "vuex";
    import Actions from "@/store/actions";

    export default {
        name: "RequestRepair",
        data() {
            return {
                makeId: null,
                serviceId: null,
                sparePartId: null,
                drive: null,
                registrationNumber: null,
                howFastTime: null,
                city: null,
                name: null,
                phone: null,
                email: null,
                description: null
            }
        },
        mixins: [errorAwareWithPreloading, roles, routeNames],
        methods: {
            async submitRepairRequest() {
                const vm = this;

                const repairRequestDto = {
                    make_id: vm.makeId,
                    service_id: vm.serviceId,
                    spare_part_id: vm.sparePartId,
                    drive: vm.drive,
                    registration_number: vm.registrationNumber,
                    how_fast_time: vm.howFastTime,
                    city: vm.city,
                    phone: vm.phone,
                    email: vm.email,
                    name: vm.name,
                    description: vm.description
                };

                await this.errorAwareStoreDispatch(
                    Actions.REPAIR_REQUEST_CREATE_HUB,
                    repairRequestDto,
                    this.$t('Your repair request have been successfully created.')
                );
            }
        },
        computed: {
            ...mapState({
                makes: state => state.repairRequest.makes,
                services: state => state.repairRequest.services,
                spareParts: state => state.repairRequest.spareParts,
            })
        },
        async created() {
            if (this.isRolesLoaded && !this.isUser) {
                console.log('RED TO HOME 6');
                this.$router.push({name: this.routeNames().ROUTE_HOME}).catch(err => {
                });
            }

            await this.$store.dispatch(Actions.REPAIR_REQUEST_FETCH_MAKES);
            await this.$store.dispatch(Actions.REPAIR_REQUEST_FETCH_SERVICES);
            await this.$store.dispatch(Actions.REPAIR_REQUEST_FETCH_SPARE_PARTS);
        }
    }
</script>

<style lang="scss">
    .w-96-p {
        width: 96%;
    }

    .request-quote-container {
        background: url('/images/girl.jpg') center no-repeat;
        background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
        -moz-background-size: cover;
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
