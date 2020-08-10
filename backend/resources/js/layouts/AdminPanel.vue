<template>
    <div>
        <AdminSidebar/>
        <div class="py-8">
            <router-view></router-view>
        </div>
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
    import AdminSidebar from "@/components/Admin/Widget/AdminSidebar";
    import Mutations from "@/store/admin/mutations";

    export default {
        name: 'AdminPanel',
        components: {AdminSidebar, Preloader, Navigation, AuthenticationScene},
        mixins: [routeNames, isAuthenticated, errorAwareWithPreloading, roles],
        beforeRouteEnter(to, from, next) {
            next(vm => {
                if (!vm.$store.state.adminPanel.adminPanel) {
                    vm.$store.commit(Mutations.ADMIN_PANEL_ENABLE);
                }
            })
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
