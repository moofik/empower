<template>
    <div>
        <div class="xs:block sf-ui-bold text-lg xs:11/12 xs:mt-2 md:mt-2">
            {{ $t('Status') }}
        </div>

        <div v-if="currentRequest.is_closed" class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Offer closed') }}
        </div>

        <div v-else-if="currentRequest.offer_been_made" class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Pending user decision') }}
        </div>

        <div v-else class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Work in progress') }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "OfferRepairRequestActions",
        props: {
            currentRequest: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
