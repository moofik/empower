<template>
    <div v-else-if="currentRequest.applicant_workshop">
        <div class="xs:block sf-ui-bold text-lg xs:11/12 xs:mt-2 md:mt-2">
            {{ $t('Status') }}
        </div>

        <div v-if="currentRequest.is_incoming" class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Waiting you to accept or deny request') }}
        </div>

        <div v-else-if="currentRequest.is_closed" class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Offer closed') }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "IncomingRepairRequestActions",
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
