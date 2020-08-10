<template>
    <div class="default-tab-wrapper flex flex-row justify-between">
        <div class="flex flex-col pb-3">
            <div v-for="option in paymentOptions" class="px-4 pt-2">
                <font-awesome-icon :far="true" icon="check-circle"/> {{option.name}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PaymentOptionsTab",
        props: {
            workshop: {
                type: Object,
                required: true
            }
        },
        computed: {
            paymentOptions() {
                return this.workshop.workshop_payment_options;
            }
        }
    }
</script>

<style scoped>

</style>
