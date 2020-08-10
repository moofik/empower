<template>
    <div>
        <div class="small-header">
            <div class="header-title"><span class="dash"></span>{{ $t($route.meta.title) }}</div>
        </div>
        <breadcrumbs />
    </div>
</template>

<script>
    import Breadcrumbs from '@/components/Breadcrumbs';
    import routeNames from '@/services/mixin/routeNames';

    export default {
        name: 'header-title',
        components: {Breadcrumbs},
        mixins: [routeNames]
    }
</script>

<style lang="scss">
    .small-header {
        padding-left: 100px;
        position: absolute;
        left: 18%;
        bottom: 18%;
    }

    .header-title {
        color: #fff;
        line-height: 1;
        font-family: "SF UI Text Bold", "Source Sans Pro", sans-serif;
        font-size: 30px;
        letter-spacing: -1px;
    }

    .dash {
        content: '';
        height: 3px;
        left: 0;
        top: 50%;
        margin-top: -1px;
        background: #191a1d;
        position: absolute;
        display: block;
        z-index: 2;
        width: 60px;
    }

    .breadcrumbs {
        position: absolute;
        left: 18%;
        margin-left: 100px;
        bottom: 16%;
        width: 400px;

        a {
            font-size: 12px;
            color: #cdd4ca;
            font-family: "SF UI Text Light", "Source Sans Pro", sans-serif;
        }
    }
</style>
