<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Warranty') }}</h3>
            <h4 class="sf-ui-bold font-bold mt-8">{{ $t('Job') }}</h4>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center1">
                <div class="flex flex-col xs:w-1/2 lg:w-1/2 mr-4">
                    <label for="job_w_months">{{ $t('Months') }}</label>
                    <input id="job_w_months" type="text" class="input-type-text" v-model="updatableWarranty.job_warranty_months"/>
                </div>
                <div class="flex flex-col xs:w-1/2 lg:w-1/2">
                    <label for="job_w_driven">{{ $t('Driven') }}</label>
                    <input id="job_w_driven" type="text" class="input-type-text" v-model="updatableWarranty.job_warranty_driven"/>
                </div>
            </div>
            <h4 class="sf-ui-bold font-bold mt-8">{{ $t('Assemblies') }}</h4>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center1">
                <div class="flex flex-col xs:w-1/2 lg:w-1/2 mr-4">
                    <label for="assemblies_w_months">{{ $t('Months') }}</label>
                    <input id="assemblies_w_months" type="text" class="input-type-text" v-model="updatableWarranty.assemblies_warranty_months"/>
                </div>
                <div class="flex flex-col xs:w-1/2 lg:w-1/2">
                    <label for="assemblies_w_driven">{{ $t('Driven') }}</label>
                    <input id="assemblies_w_driven" type="text" class="input-type-text" v-model="updatableWarranty.assemblies_warranty_driven"/>
                </div>
            </div>
            <h4 class="sf-ui-bold font-bold mt-8">{{ $t('Additional information') }}</h4>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center">
                <textarea class="input-type-text xs:w-full lg:w-full" v-model="updatableWarranty.additional_info"></textarea>
            </div>
            <button class="btn-orange-default" @click.prevent="updateWarranty">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import Actions from "@/store/actions";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import Preloader from "@/components/Widget/Preloader";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        name: "Warranty",
        components: {Preloader, ErrorWidget, SuccessWidget},
        data() {
            return {
                updatableWarranty: {}
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            async updateWarranty() {
                await this.errorAwareStoreDispatch(
                    Actions.WARRANTY_WORKSHOP_UPDATE,
                    this.updatableWarranty,
                    this.$t('Your warranty data has been successfully updated.')
                );
            }
        },
        watch: {
            warranty() {
                this.updatableWarranty = JSON.parse(JSON.stringify(this.warranty));
            }
        },
        computed: {
            ...mapState({
                warranty: state => state.workshopProfile.warranty
            }),
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.WARRANTY_WORKSHOP_FETCH);
        }
    }
</script>

<style scoped>

</style>
