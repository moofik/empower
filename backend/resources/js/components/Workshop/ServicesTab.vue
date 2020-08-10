<template>
    <div class="default-tab-wrapper flex flex-row justify-between">
        <div class="flex flex-col pb-3">
            <h4 class="px-4 py-3">Main services</h4>
            <div v-for="service in mainServices" class="px-4 pt-2">
                {{service.name}}
            </div>
        </div>
        <div class="flex flex-col pb-3">
            <h4 class="px-4 py-3">Additional services</h4>
            <div v-for="service in additionalServices" class="px-4 pt-2">
                {{service.name}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ServicesTab",
        props: {
            workshop: {
                type: Object,
                required: true
            }
        },
        computed: {
            mainServices() {
                return this.workshop.workshop_services.filter(service => !service.is_additional);
            },
            additionalServices() {
                return this.workshop.workshop_services.filter(service => service.is_additional);
            },
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
</style>
