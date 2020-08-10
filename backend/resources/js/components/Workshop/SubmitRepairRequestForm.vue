<template>
    <div v-if="isActive" class="fixed top-0 left-0 xs:w-full sm:w-full h-full flex z-50 justify-center items-center">
        <div class="xs:w-full sm:w-full h-full fixed backdrop z-40"></div>
        <form class="bg-white z-50 submit-request-modal border border-teal-500 shadow-lg fixed
            bg-white mx-auto rounded overflow-y-auto md:max-w-md md:p-8" @submit.prevent="submitRepairRequest">
            <div class="form-group-row xs:block">
                <div class="form-unit xs:w-full">
                    <label>
                        <select name="carMake" class="input-type-select xs:w-full" v-model="makeId" autocomplete="off"
                                required>
                            <option value="null" disabled hidden>{{$t('Choose a make')}}</option>
                            <option v-for="make in makes" :value="make.id">{{make.name}}</option>
                        </select>
                    </label>
                </div>
                <div class="form-unit xs:w-full text-right pr-4">
                    <span class="cursor-pointer" @click="$emit('close')"><b>X</b></span>
                </div>
            </div>
            <div class="form-group-row xs:block">
                <div class="form-unit xs:w-full">
                    <label>
                        <select name="repairCategory" class="input-type-select xs:w-full" v-model="serviceId"
                                autocomplete="off" required>
                            <option value="null" disabled hidden>{{$t('Select a category')}}</option>
                            <option v-for="service in services" :value="service.id">{{$t(service.name)}}</option>
                        </select>
                    </label>
                </div>
                <div class="form-unit xs:w-full">
                    <label>
                        <select name="how_fast_time" class="input-type-select xs:w-full" v-model="howFastTime"
                                autocomplete="off" required>
                            <option value="null" disabled hidden>{{$t('Select an urgency')}}</option>
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
                    <select name="usedParts" class="input-type-select xs:w-full" v-model="sparePartId"
                            autocomplete="off">
                        <option value="null" disabled hidden>{{$t('Choose spare parts')}}</option>
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
                <textarea type="text" name="comment" id="comment"
                          :placeholder="$t('Describe the problem')"
                          class="input-type-text xs:w-full md:w-24/25"
                          autocomplete="comment" v-model="description" required></textarea>
            </div>
            <p class="text-center form-notice text-gray-700">{{$t('All fields are required.')}}</p>
            <p class="text-center">
                <button class="btn-orange-default btn-flat" type="button" @click="submitRepairRequest">
                    {{$t('Submit request')}}>
                </button>
            </p>
        </form>
    </div>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import roles from "@/services/mixin/roles";
    import routeNames from "@/services/mixin/routeNames";
    import Actions from "@/store/actions";

    export default {
        name: "submit-repair-request-form",
        props: {
            isActive: Boolean,
            workshopId: {
                type: Number,
                required: true
            },
            makes: {
                type: Array,
                required: true
            },
            services: {
                type: Array,
                required: true
            },
            spareParts: {
                type: Array,
                required: true
            }
        },
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
                    workshop_id: vm.workshopId,
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
                    Actions.REPAIR_REQUEST_CREATE_SPECIFIC,
                    repairRequestDto,
                    this.$t('Your repair request have been successfully created.')
                );

                this.$emit('close');
            }
        },
        async created() {
            if (this.isRolesLoaded && !this.isUser) {
                this.$router.push({name: this.routeNames().ROUTE_HOME}).catch(err => {
                });
            }
        }
    }
</script>

<style scoped>
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    .animated.faster {
        -webkit-animation-duration: 500ms;
        animation-duration: 500ms;
    }

    .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }

    .fadeOut {
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    .main-modal {
        border: 5px solid #f2be54;
        border-radius: 15px;
        width: 310px;
        padding: 15px 20px;
    }

    .backdrop {
        background: rgba(21, 62, 92, .8);
        left: 0;
        top: 0;
    }

    .submit-request-modal {
        border: 5px solid #f2be54;
        border-radius: 15px;
        padding: 15px 20px;
    }
</style>
