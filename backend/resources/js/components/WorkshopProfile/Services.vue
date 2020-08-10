<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Services') }}</h3>
            <div class="form-big-unit" v-for="(service, key) in updatableServices">
                <input type="checkbox" :id="key" v-model="service.active" />
                <label :for="key">{{ service.name }}</label>
            </div>
            <button class="btn-orange-default" @click.prevent="updateMainServices">{{ $t('Save') }}</button>
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
        name: "Services",
        components: {Preloader, SuccessWidget, ErrorWidget},
        data() {
            return {
                updatableServices: {}
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            async updateMainServices() {
                await this.errorAwareStoreDispatch(
                    Actions.SERVICES_WORKSHOP_UPDATE_MAIN,
                    this.updatableServices,
                    this.$t('Your services have been successfully updated.')
                );
            }
        },
        watch: {
            services() {
                this.updatableServices = JSON.parse(JSON.stringify(this.services));
            }
        },
        computed: {
            ...mapState({
                services: state => state.workshopProfile.services
            }),
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.SERVICES_WORKSHOP_FETCH_MAIN);
        }
    }
</script>

<style scoped>

</style>
