<template>
    <div>
        <header :class="{'no-bottom-border': this.noHeaderBorder}" class="main-header relative max-width-1920">
            <a class="main-logo">
                <img src="/images/logo.png" alt="alfi"/>
            </a>

            <authentication-scene/>

            <slot name="background"></slot>

            <navigation />

            <slot name="teaser"></slot>
            <slot name="title"></slot>
        </header>

        <preloader v-if="!isRolesLoaded"></preloader>
        <slot v-else></slot>
    </div>
</template>

<script>
    import AuthenticationScene from '@/components/AuthenticationScene';
    import routeNames from '@/services/mixin/routeNames';
    import isAuthenticated from '@/services/mixin/isAuthenticated';
    import Navigation from "@/components/Navigation";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import roles from "@/services/mixin/roles";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: 'DefaultLayout',
        components: {Preloader, Navigation, AuthenticationScene},
        mixins: [routeNames, isAuthenticated, errorAwareWithPreloading, roles],
        computed: {
            noHeaderBorder() {
                return this.isContactUsPage;
            },
            isContactUsPage() {
                return this.$route.name === this.routeNames().ROUTE_CONTACT_US;
            }
        }
    }
</script>

<style lang="scss">
    @import '~/sass/app.scss';

    body {
        font-family: "SF UI Font Regular", sans-serif;
    }

    .main-logo {
        left: 50px;
        top: 50px;
        position: absolute;
        z-index: 5;
    }

    .max-width-1920 {
        max-width: 1920px;
    }

    nav.main-nav {
        font-family: "SF UI Text Normal", sans-serif;
        right: 50px;
        position: absolute;
        z-index: 5;
        top: 90px;
        white-space: nowrap;

        a {
            margin-left: 32px;
            text-transform: uppercase;
            color: #f2be54;
            font-size: 13px;
            outline: none;
            text-decoration: underline;
            cursor: pointer;

            &.active {
                color: white;
                text-decoration: none;
            }
        }
    }

    .main-header:not(.no-bottom-border) {
        &::after {
            content: '';
            display: block;
            height: 13px;
            width: 100%;
            font-size: 1px;
            background: url("/images/reshetka.gif") repeat-x;
        }
    }
</style>
