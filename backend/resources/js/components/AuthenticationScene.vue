<template>
    <div>
        <div class="authentication-navigation flex flex-row justify-between">
            <div v-if="!isAuthenticated" @click="openLoginForm">
                <font-awesome-icon icon="user-circle"/>
                {{ $t('Sign In') }}
            </div>
            <router-link v-if="isAuthenticated && isWorkshop" tag="a" :to="{name: routeNames().ROUTE_PROFILE}" class="mr-2">
                <font-awesome-icon icon="user-circle"/>
                {{ $t('Profile information') }}
            </router-link>
            <div v-if="isModerator || isAdmin" @click="navigateToAdminPanel" class="mr-2">
                <font-awesome-icon icon="user-circle"/>
                {{ $t('Admin panel') }}
            </div>
            <div v-if="isAuthenticated" @click="logoutAndRedirect">
                <font-awesome-icon icon="user-circle"/>
                {{ $t('Exit') }}
            </div>
        </div>

        <login-form @close="closeLoginForm" @logged-in='loggedIn' :is-active="isLoginFormActive"/>
    </div>
</template>

<script>
    import LoginForm from '@/components/LoginForm';
    import {mapActions} from 'vuex';
    import Actions from '@/store/actions';
    import isAuthenticated from '@/services/mixin/isAuthenticated';
    import routeNames from '@/services/mixin/routeNames';
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import roles from "@/services/mixin/roles";
    import Mutations from "@/store/admin/mutations";
    import Routes from "@/router/routeNames";
    import ApiService from "@/services/api/apiService";

    export default {
        name: "AuthenticationScene",
        components: {
            LoginForm
        },
        mixins: [isAuthenticated, routeNames, errorAwareWithPreloading, roles],
        data() {
            return {
                isLoginFormActive: false
            }
        },
        methods: {
            ...mapActions({
                logout: Actions.AUTH_LOGOUT
            }),
            openLoginForm() {
                this.isLoginFormActive = true;
            },
            closeLoginForm() {
                this.isLoginFormActive = false;
            },
            async loggedIn() {
                await this.errorAwareStoreDispatch(Actions.AUTH_FETCH_ROLES);
                this.isLoginFormActive = false;
                try {
                    await this.$router.push({name: 'home'});
                } catch (e) {
                }
            },
            async logoutAndRedirect() {
                await this.logout();
                ApiService.setBearerToken('');
                this.$router.go({name: Routes.ROUTE_HOME});
                this.$router.go();
            },
            navigateToAdminPanel() {
                this.$store.commit(Mutations.ADMIN_PANEL_ENABLE);
                this.$router.push({name: Routes.ROUTE_ADMIN_SHOPS}).catch(() => {});
            }
        }
    }
</script>

<style scoped lang="scss">
    .authentication-navigation {
        left: 50%;
        top: 90px;
        position: absolute;
        z-index: 6;
        margin-left: -340px;
        cursor: pointer;
        color: #f2be54;

        a {
            color: #f2be54;
            text-decoration: none;
            font-size: 16px;
        }
    }
</style>
