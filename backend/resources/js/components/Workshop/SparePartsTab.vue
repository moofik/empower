<template>
    <div class="default-tab-wrapper flex flex-row justify-between">
        <div class="flex flex-col pb-3">
            <div v-for="parts in spareParts" class="px-4 pt-2">
                <font-awesome-icon :far="true" icon="check-circle"/> {{parts.name}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SparePartsTab",
        props: {
            workshop: {
                type: Object,
                required: true
            }
        },
        computed: {
            spareParts() {
                return this.workshop.workshop_spare_parts;
            }
        }
    }
</script>

<style scoped>

</style>
