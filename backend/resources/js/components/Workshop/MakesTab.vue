<template>
    <div class="default-tab-wrapper block">
        <div class="flex flex-row justify-between contact-us-block">
            <div class="w-1/3 flex justify-start ui-bold font-bold">{{ $t('Make') }}</div>
            <div class="w-1/3 flex justify-center ui-bold font-bold">{{ $t('From') }}</div>
            <div class="w-1/3 flex justify-end sf-ui-bold font-bold">{{ $t('To') }}</div>
        </div>
            <div class="flex flex-row contact-us-block" v-for="make in makes">
            <div class="w-1/3 flex justify-start">{{ make.name }}</div>
            <div class="w-1/3 flex justify-center">{{ make.from }}</div>
            <div class="w-1/3 flex justify-end">{{ make.to }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MakesTab",
        props: {
            workshop: {
                type: Object,
                required: true
            }
        },
        computed: {
            makes() {
                return this.workshop.workshop_makes;
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
