<template>
    <div>
        <div class="xs:block sf-ui-bold text-lg xs:11/12 xs:mt-2 md:mt-2">
            {{ $t('Status') }}
        </div>

        <div v-if="currentRequest.is_closed" class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Offer closed') }}
        </div>

        <div v-else-if="currentRequest.applicant_workshop" class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Work in progress') }}
        </div>

        <div v-else class="btn-transparent-nomargin-nocursor btn-flat">
            {{ $t('Ready to offer') }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "HubRepairRequestStatuses",
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
