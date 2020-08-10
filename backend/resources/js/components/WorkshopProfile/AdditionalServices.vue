<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <error-widget v-if="hasError"></error-widget>
        <success-widget v-if="!hasError"></success-widget>
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Additional Services') }}</h3>
            <div class="form-big-unit" v-for="(service, key) in updatableServices">
                <input type="checkbox" :id="key" v-model="service.active" />
                <label :for="key">{{ service.name }}</label>
            </div>
            <button class="btn-orange-default" @click.prevent="updateAdditionalServices">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import Actions from "@/store/actions";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "AdditionalServices",
        mixins: [errorAwareWithPreloading],
        components: {Preloader, SuccessWidget, ErrorWidget},
        data() {
            return {
                updatableServices: {}
            }
        },
        methods: {
            async updateAdditionalServices() {
                await this.errorAwareStoreDispatch(
                    Actions.SERVICES_WORKSHOP_UPDATE_ADDITIONAL,
                    this.updatableServices,
                    this.$t('Additional services have been successfully updated.')
                );
            }
        },
        watch: {
            additionalServices() {
                this.updatableServices = JSON.parse(JSON.stringify(this.additionalServices));
            }
        },
        computed: {
            ...mapState({
                additionalServices: state => state.workshopProfile.additionalServices
            }),
        },
        async created() {
            this.errorAwareStoreDispatch(Actions.SERVICES_WORKSHOP_FETCH_ADDITIONAL);
        }
    }
</script>

<style scoped>

</style>
