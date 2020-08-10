<template>
    <div class="default-tab-wrapper block">
        <div class="flex flex-row justify-between warranty-block">
            <div class="w-1/3 flex justify-start ui-bold font-bold">{{ $t('Job') }}</div>
        </div>
        <div class="flex flex-row warranty-block pb-2">
            <div class="w-1/2 flex justify-start ui-bold font-bold">{{ $t('Months') }}</div>
            <div class="w-1/2 flex justify-start ui-bold font-bold">{{ $t('Driven') }}</div>
        </div>
        <div class="flex flex-row warranty-block">
            <div class="w-1/2 flex justify-start">{{ warranty.job_warranty_months }}</div>
            <div class="w-1/2 flex justify-start">{{ warranty.job_warranty_driven }}</div>
        </div>
        <br />
        <div class="flex flex-row justify-between warranty-block">
            <div class="w-1/3 flex justify-start ui-bold font-bold">{{ $t('Assemblies') }}</div>
        </div>
        <div class="flex flex-row warranty-block py-2">
            <div class="w-1/2 flex justify-start ui-bold font-bold">{{ $t('Months') }}</div>
            <div class="w-1/2 flex justify-start ui-bold font-bold">{{ $t('Driven') }}</div>
        </div>
        <div class="flex flex-row warranty-block">
            <div class="w-1/2 flex justify-start">{{ warranty.assemblies_warranty_months }}</div>
            <div class="w-1/2 flex justify-start">{{ warranty.assemblies_warranty_driven}}</div>
        </div>
        <br />
        <div class="flex flex-row justify-between warranty-block">
            <div class="w-1/3 flex justify-start ui-bold font-bold">{{ $t('Additional information') }}</div>
        </div>
        <div class="flex flex-row warranty-block py-2">
            <p>{{warranty.additional_info}}</p>
        </div>

    </div>
</template>

<script>
    export default {
        name: "ScheduleTab",
        props: {
            workshop: {
                type: Object,
                required: true
            }
        },
        computed: {
            warranty() {
                return this.workshop.workshop_warranty;
            }
        }
    }
</script>

<style scoped lang="scss">
    .default-tab-wrapper {
        h4 {
            font-size: 16px;
            font-family: "SF UI Text Bold", sans-serif;
        }
    }

    .warranty-block {
        @apply border-none;
    }
</style>

