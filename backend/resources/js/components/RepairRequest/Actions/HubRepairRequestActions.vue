<template>
    <div></div>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        name: "HubRepairRequestActions",
        mixins: [errorAwareWithPreloading],
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
