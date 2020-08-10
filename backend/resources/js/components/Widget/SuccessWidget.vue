<template>
    <p class="text-green-900 sf-ui-regular text-sm">
        {{ message }}
    </p>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        name: "SuccessWidget",
        computed: {
            ...mapState({
                status: state => state.error.status,
                message: state => state.error.message
            })
        }
    }
</script>

<style lang="scss">

</style>
