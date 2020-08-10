<template>
    <p class="text-red-900 sf-ui-regular text-sm">
        {{ message }}
    </p>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        name: "ErrorWidget",
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
