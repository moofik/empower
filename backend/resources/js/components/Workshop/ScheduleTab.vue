<template>
    <div class="default-tab-wrapper block">
        <div class="flex flex-row justify-between contact-us-block">
            <div class="w-1/3 flex justify-start ui-bold font-bold">{{ $t('Weekday') }}</div>
            <div class="w-1/3 flex justify-center ui-bold font-bold">{{ $t('From') }}</div>
            <div class="w-1/3 flex justify-end sf-ui-bold font-bold">{{ $t('To') }}</div>
        </div>
        <div class="flex flex-row contact-us-block" v-if="schedule.monday_active">
            <div class="w-1/3 flex justify-start">{{ $t('Monday') }}</div>
            <div class="w-1/3 flex justify-center">{{ schedule.monday_from }}</div>
            <div class="w-1/3 flex justify-end">{{ schedule.monday_to }}</div>
        </div>
        <div class="flex flex-row contact-us-block" v-if="schedule.tuesday_active">
            <div class="w-1/3 flex justify-start">{{ $t('Tuesday') }}</div>
            <div class="w-1/3 flex justify-center">{{ schedule.tuesday_from }}</div>
            <div class="w-1/3 flex justify-end">{{ schedule.tuesday_to }}</div>
        </div>
        <div class="flex flex-row contact-us-block" v-if="schedule.wednesday_active">
            <div class="w-1/3 flex justify-start">{{ $t('Wednesday') }}</div>
            <div class="w-1/3 flex justify-center">{{ schedule.wednesday_from }}</div>
            <div class="w-1/3 flex justify-end">{{ schedule.wednesday_to }}</div>
        </div>
        <div class="flex flex-row contact-us-block" v-if="schedule.thursday_active">
            <div class="w-1/3 flex justify-start">{{ $t('Thursday') }}</div>
            <div class="w-1/3 flex justify-center">{{ schedule.thursday_from }}</div>
            <div class="w-1/3 flex justify-end">{{ schedule.thursday_to }}</div>
        </div>
        <div class="flex flex-row contact-us-block" v-if="schedule.friday_active">
            <div class="w-1/3 flex justify-start">{{ $t('Friday') }}</div>
            <div class="w-1/3 flex justify-center">{{ schedule.friday_from }}</div>
            <div class="w-1/3 flex justify-end">{{ schedule.friday_to }}</div>
        </div>
        <div class="flex flex-row contact-us-block" v-if="schedule.saturday_active">
            <div class="w-1/3 flex justify-start">{{ $t('Saturday') }}</div>
            <div class="w-1/3 flex justify-center">{{ schedule.saturday_from }}</div>
            <div class="w-1/3 flex justify-end">{{ schedule.saturday_to }}</div>
        </div>
        <div class="flex flex-row contact-us-block" v-if="schedule.sunday_active">
            <div class="w-1/3 flex justify-start">{{ $t('Sunday') }}</div>
            <div class="w-1/3 flex justify-center">{{ schedule.sunday_from }}</div>
            <div class="w-1/3 flex justify-end">{{ schedule.sunday_to }}</div>
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
            schedule() {
                return this.workshop.workshop_schedule;
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

    .contact-us-block {
        @apply border-gray-400 border border-l-0 border-r-0 border-b-0 px-4 py-3;

        &.last {
            @apply border-b;
        }
    }
</style>

