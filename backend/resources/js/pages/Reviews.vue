<template>
    <div>
        <reviews-list :key="workshopIdKey" :limit="3" :workshop-id="workshopId"/>
    </div>
</template>

<script>
    import ReviewsList from "@/components/Reviews/ReviewsList";
    export default {
        name: "Reviews",
        components: {ReviewsList},
        computed: {
            workshopId() {
                if (this.$route.params && this.$route.params.id !== null && this.$route.params.id !== undefined) {
                    return parseInt(this.$route.params.id);
                }

                return null;
            },
            workshopIdKey() {
                return (this.workshopId === null) ? -1 : this.workshopId;
            }
        }
    }
</script>

<style scoped>

</style>
