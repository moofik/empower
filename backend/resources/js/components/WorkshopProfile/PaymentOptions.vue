<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading"/>
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Payment Options') }}</h3>
            <div class="form-big-unit" v-for="(option, key) in updatablePaymentOptions">
                <input type="checkbox" :id="key" v-model="option.active" />
                <label :for="key">{{ option.name }}</label>
            </div>
            <button class="btn-orange-default" @click.prevent="updatePaymentOptions">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import Actions from "@/store/actions";
    import Preloader from "@/components/Widget/Preloader";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import ErrorWidget from "@/components/Widget/ErrorWidget";

    export default {
        name: "PaymentOptions",
        components: {ErrorWidget, SuccessWidget, Preloader},
        data() {
            return {
                updatablePaymentOptions: {}
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            async updatePaymentOptions() {
                await this.errorAwareStoreDispatch(
                    Actions.PAYMENT_OPTIONS_WORKSHOP_UPDATE,
                    this.updatablePaymentOptions,
                    this.$t('Your payment options have been successfully updated')
                );
            }
        },
        watch: {
            paymentOptions() {
                this.updatablePaymentOptions = JSON.parse(JSON.stringify(this.paymentOptions));
            }
        },
        computed: {
            ...mapState({
                paymentOptions: state => state.workshopProfile.paymentOptions
            }),
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.PAYMENT_OPTIONS_WORKSHOP_FETCH);
        }
    }
</script>

<style scoped>

</style>
