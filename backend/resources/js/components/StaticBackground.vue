<template>
    <header class="static-background">
        <slot name="content"></slot>
    </header>
</template>

<script>
    export default {
        name: "StaticBackground"
    }
</script>

<style lang="scss">
    .static-background {
        background: url("~/images/header.jpg") center no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        min-height: 375px;
        max-height: fit-content;
    }
</style>
