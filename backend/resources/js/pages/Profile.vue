<template>
    <div class="flex flex-row mx-auto justify-between">
        <preloader v-if="loading"/>
        <template v-else>
            <workshop-profile-menu v-if="isWorkshop" @way="resolvePath" @logout="logoutAndRefresh"/>
            <!--<user-profile-menu v-else @way="resolvePath"/>-->
            <component :is="profileComponent"/>
        </template>
    </div>
</template>

<script>
    import WorkshopProfileMenu from "@/components/WorkshopProfile/WorkshopProfileMenu";
    import Routes from "@/router/routeNames";
    import protectedRoute from "@/services/mixin/protectedRoute";
    import Preloader from "@/components/Widget/Preloader";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import roles from "@/services/mixin/roles";
    import ProfileComponents from "@/components/WorkshopProfile/profileComponents";
    import ApiService from "@/services/api/apiService";
    import {mapActions} from "vuex";
    import Actions from "@/store/actions";

    const WorkshopBasicSettings = () => import(/* webpackChunkName: "workshop-profile-Shop" */"@/components/WorkshopProfile/BasicSettings");
    const Services = () => import(/* webpackChunkName: "profile-services" */"@/components/WorkshopProfile/Services");
    const AdditionalServices = () => import(/* webpackChunkName: "profile-additional-services" */"@/components/WorkshopProfile/AdditionalServices");
    const Makes = () => import(/* webpackChunkName: "profile-makes" */"@/components/WorkshopProfile/Makes");
    const PaymentOptions = () => import(/* webpackChunkName: "profile-payment-options" */"@/components/WorkshopProfile/PaymentOptions");
    const Schedule = () => import(/* webpackChunkName: "profile-schedule" */"@/components/WorkshopProfile/Schedule");
    const SpareParts = () => import(/* webpackChunkName: "profile-spare-parts" */"@/components/WorkshopProfile/SpareParts");
    const Warranty = () => import(/* webpackChunkName: "profile-warranty" */"@/components/WorkshopProfile/Warranty");
    const LogoChange = () => import(/* webpackChunkName: "profile-logo-change" */"@/components/WorkshopProfile/LogoChange");
    const Certificates = () => import(/* webpackChunkName: "profile-certificates" */"@/components/WorkshopProfile/Certificates");
    const EmailSetup = () => import(/* webpackChunkName: "profile-email-setup" */"@/components/WorkshopProfile/EmailSetup");
    const ChangePassword = () => import(/* webpackChunkName: "profile-change-password" */"@/components/WorkshopProfile/ChangePassword");
    const RepairRequests = () => import(/* webpackChunkName: "profile-change-password" */"@/components/ItemRequest/Widgets/RepairRequestOffers");

    export default {
        name: "Profile",
        components: {
            Preloader,
            WorkshopProfileMenu,
            [ProfileComponents.PROFILE_BASIC_SETTINGS]: WorkshopBasicSettings,
            [ProfileComponents.PROFILE_SERVICES]: Services,
            [ProfileComponents.PROFILE_ADDITIONAL_SERVICES]: AdditionalServices,
            [ProfileComponents.PROFILE_MAKES]: Makes,
            [ProfileComponents.PROFILE_PAYMENT_OPTIONS]: PaymentOptions,
            [ProfileComponents.PROFILE_SCHEDULE]: Schedule,
            [ProfileComponents.PROFILE_SPARE_PARTS]: SpareParts,
            [ProfileComponents.PROFILE_WARRANTY]: Warranty,
            [ProfileComponents.PROFILE_LOGO_CHANGE]: LogoChange,
            [ProfileComponents.PROFILE_EMAIL_SETUP]: EmailSetup,
            [ProfileComponents.PROFILE_CHANGE_PASSWORD]: ChangePassword,
            [ProfileComponents.PROFILE_CERTIFICATES]: Certificates,
            [ProfileComponents.PROFILE_USER_REQUESTS]: RepairRequests
        },
        mixins: [protectedRoute, errorAwareWithPreloading, roles],
        computed: {
            profileComponent() {
                return this.$route.meta.profileComponent;
            },
        },
        methods: {
            ...mapActions({
                logout: Actions.AUTH_LOGOUT
            }),
            resolvePath(route) {
                this.$router.push({name: route}).catch(err => {
                });
            },
            async logoutAndRefresh() {
                await this.logout();
                ApiService.setBearerToken('');
                this.$router.go();
            }
        },
        async created() {
            if (this.$route.name === Routes.ROUTE_PROFILE && this.isWorkshop) {
                this.$router.push({name: Routes.ROUTE_WORKSHOP_PROFILE_BASIC_SETTINGS}).catch(err => {
                    console.log('Redirecting error', err);
                });
            } else if (this.$route.name === Routes.ROUTE_PROFILE && this.isUser) {
                this.$router.push({name: Routes.ROUTE_USER_PROFILE_BASIC_SETTINGS}).catch(err => {
                    console.log('Redirecting error', err);
                });
            }
        }
    }
</script>

<style scoped>

</style>
