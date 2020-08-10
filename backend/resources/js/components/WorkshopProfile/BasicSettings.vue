<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <error-widget v-if="hasError" />
        <success-widget v-if="!hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Basic') }}</h3>
            <div class="form-group-row">
                <div class="form-unit">
                    <label for="workshop_name" class="form-default-label">{{ $t('Name of workshop') }}</label>
                    <input type="text" name="workshop_name" id="workshop_name" v-model="workshopName"
                           class="input-type-text required"
                           autocomplete="workshop_name" required>
                </div>
                <div class="form-unit">
                    <label for="workshop_address" class="form-default-label">{{ $t('Address of workshop') }}</label>
                    <input type="text" name="workshop_address" id="workshop_address" v-model="workshopAddress"
                           class="input-type-text required"
                           autocomplete="workshop_address" required>
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-unit">
                    <label for="company_name" class="form-default-label">{{ $t('Name of the company') }}</label>
                    <input type="text" name="company_name" id="company_name" v-model="companyName"
                           class="input-type-text required"
                           autocomplete="company_name" required>
                </div>
                <div class="form-unit">
                    <label for="zip_code" class="form-default-label">{{ $t('ZIP code') }}</label>
                    <input type="text" name="zip_code" id="zip_code" v-model="zipCode"
                           class="input-type-text required"
                           autocomplete="zip_code" required>
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-unit">
                    <label for="business_id" class="form-default-label">{{ $t('Business id') }}</label>
                    <input type="text" name="business_id" id="business_id" v-model="businessId"
                           class="input-type-text required"
                           autocomplete="business_id" required>
                </div>
                <div class="form-unit">
                    <label for="city" class="form-default-label">{{ $t('City') }}</label>
                    <input type="text" name="zip_code" id="city" v-model="city"
                           class="input-type-text required"
                           autocomplete="city" required>
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-unit">
                    <label for="workshopPhone" class="form-default-label">{{ $t('Shop phone') }}</label>
                    <input type="text" name="workshopPhone" id="workshopPhone" v-model="workshopPhone"
                           class="input-type-text required"
                           autocomplete="workshopPhone" required>
                </div>
                <div class="form-small-unit">
                    <label for="employee" class="form-default-label">{{ $t('Employee') }}</label>
                    <input type="number" name="employee" id="employee" v-model="employee"
                           class="input-type-text"
                           autocomplete="employee">
                </div>
                <div class="form-small-unit">
                    <label for="founded" class="form-default-label">{{ $t('Founded') }}</label>
                    <input type="number" name="zip_code" id="founded" v-model="founded"
                           class="input-type-text"
                           autocomplete="founded">
                </div>
            </div>
            <div class="form-group-row">
                <div class="btn-orange-default" @click="updateSettings">Save</div>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "WorkshopBasicSettings",
        components: {Preloader, SuccessWidget, ErrorWidget},
        data() {
            return {
                cityValue: null,
                businessIdValue: null,
                workshopNameValue: null,
                workshopAddressValue: null,
                companyNameValue: null,
                zipCodeValue: null,
                workshopPhoneValue: null,
                employeeValue: null,
                foundedValue: null
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            async updateSettings() {
                const vm = this;

                const settingsDto = {
                    city: vm.city,
                    business_id: vm.businessId,
                    workshop_name: vm.workshopName,
                    workshop_address: vm.workshopAddress,
                    company_name: vm.companyName,
                    zip_code: vm.zipCode,
                    workshop_phone: vm.workshopPhone,
                    employee: vm.employee,
                    founded: vm.founded
                };

                await this.errorAwareStoreDispatch(
                    Actions.SETTINGS_WORKSHOP_UPDATE_BASIC,
                    settingsDto,
                    this.$t('Your settings have been successfully updated.')
                );
            }
        },
        computed: {
            ...mapState({
                basicSettings: state => state.workshopProfile.basicSettings
            }),

            workshopName: {
                get: function () {
                    if (this.workshopNameValue !== null && typeof this.workshopNameValue !== "undefined")
                        return this.workshopNameValue;

                    return this.basicSettings ? this.basicSettings.workshop_name : null
                },

                set: function (value) {
                    this.workshopNameValue = value;
                }
            },

            workshopAddress: {
                get: function () {
                    if (this.workshopAddressValue !== null && typeof this.workshopAddressValue !== "undefined")
                        return this.workshopAddressValue;

                    return this.basicSettings ? this.basicSettings.workshop_address : null
                },

                set: function (value) {
                    this.workshopAddressValue = value;
                }
            },

            companyName: {
                get: function () {
                    if (this.companyNameValue !== null && typeof this.companyNameValue !== "undefined")
                        return this.companyNameValue;

                    return this.basicSettings ? this.basicSettings.company_name : null
                },

                set: function (value) {
                    this.companyNameValue = value;
                }
            },

            zipCode: {
                get: function () {
                    if (this.zipCodeValue !== null && typeof this.zipCodeValue !== "undefined")
                        return this.zipCodeValue;

                    return this.basicSettings ? this.basicSettings.zip_code : null
                },

                set: function (value) {
                    this.zipCodeValue = value;
                }
            },

            workshopPhone: {
                get: function () {
                    if (this.workshopPhoneValue !== null && typeof this.workshopPhoneValue !== "undefined")
                        return this.workshopPhoneValue;

                    return this.basicSettings ? this.basicSettings.workshop_phone : null
                },

                set: function (value) {
                    this.workshopPhoneValue = value;
                }
            },

            city: {
                get: function () {
                    if (this.cityValue !== null && typeof this.cityValue !== "undefined")
                        return this.cityValue;

                    return this.basicSettings ? this.basicSettings.city : null
                },

                set: function (value) {
                    this.cityValue = value;
                }
            },

            businessId: {
                get: function () {
                    if (this.businessIdValue !== null && typeof this.businessIdValue !== "undefined")
                        return this.businessIdValue;

                    return this.basicSettings ? this.basicSettings.business_id : null
                },

                set: function (value) {
                    this.businessIdValue = value;
                }
            },

            employee: {
                get: function () {
                    if (this.employeeValue !== null && typeof this.employeeValue !== "undefined")
                        return this.employeeValue;

                    return this.basicSettings ? this.basicSettings.employee : null
                },

                set: function (value) {
                    this.employeeValue = value;
                }
            },

            founded: {
                get: function () {
                    if (this.foundedValue !== null && typeof this.foundedValue !== "undefined")
                        return this.foundedValue;

                    return this.basicSettings ? this.basicSettings.founded : null
                },

                set: function (value) {
                    this.foundedValue = value;
                }
            }
        },
        created() {
            this.$store.dispatch(Actions.SETTINGS_WORKSHOP_FETCH_BASIC);
        }
    }
</script>

<style>

</style>
