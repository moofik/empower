<template>
    <div>
        <reviews-list v-if="workshopId" :limit="3" workshop-id="workshopId" />
    </div>
</template>

<script>
    import ReviewsList from "@/components/Reviews/ReviewsList";
    export default {
        name: "Reviews",
        components: {ReviewsList},
        computed: {
            workshopId() {
                return parseInt(this.$route.params.id);
            }
        }
    }
</script>

<style scoped>

</style>
