<template>
    <div class="default-tab-wrapper block">
        <div class="flex flex-row justify-between contact-us-block">
            <span>{{ $t('Name of the company') }}</span>
            <span>{{ contactData.workshop_name }}</span>
        </div>
        <div class="flex flex-row justify-between contact-us-block">
            <span>{{ $t('ZIP code') }}</span>
            <span>{{ contactData.zip_code }}</span>
        </div>
        <div class="flex flex-row justify-between contact-us-block">
            <span>{{ $t('Business ID') }}</span>
            <span>{{ contactData.business_id }}</span>
        </div>
        <div class="flex flex-row justify-between contact-us-block">
            <span>{{ $t('City') }}</span>
            <span>{{ contactData.city }}</span>
        </div>
        <div class="flex flex-row justify-between contact-us-block">
            <span>{{ $t('Address of the company') }}</span>
            <span>{{ contactData.workshop_address }}</span>
        </div>
        <div class="flex flex-row justify-between contact-us-block">
            <span>{{ $t('Phone number') }}</span>
            <span>{{ contactData.workshop_phone }}</span>
        </div>
        <div class="flex flex-row justify-between contact-us-block">
            <span>{{ $t('Employee count') }}</span>
            <span>{{ contactData.employee }}</span>
        </div>
        <div class="flex flex-row justify-between contact-us-block last">
            <span>{{ $t('Founded') }}</span>
            <span>{{ contactData.founded }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactUsTab",
        props: {
            workshop: {
                type: Object,
                required: true
            }
        },
        computed: {
            contactData() {
                return this.workshop.workshop_settings;
            }
        }
    }
</script>

<style scoped lang="scss">
    .contact-us-block {
        @apply border-gray-400 border border-l-0 border-r-0 border-b-0 px-4 py-3;

        &.last {
            @apply border-b;
        }
    }
</style>
