<template>
    <div>
        <v-dialog/>
        <component :is="layout">
            <template v-slot:background>
                <component :is="background" v-slot:content>
                    <template v-if="isContactUsPage">
                        <contact-content />
                    </template>
                </component>
            </template>

            <template v-if="isHomePage" v-slot:teaser>
                <tender-teaser/>
            </template>

            <template v-if="!isHomePage && !isContactUsPage" v-slot:title>
                <header-title :key="$route.fullPath"/>
            </template>

            <router-view></router-view>

            <page-footer/>
        </component>
    </div>
</template>

<script>
    import DefaultLayout from '@/layouts/Default';
    import PageFooter from '@/components/PageFooter';
    import routeNames from "@/services/mixin/routeNames";
    import Actions from "@/store/actions";
    import roles from "@/services/mixin/roles";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import {mapState} from "vuex";

    const HeaderTitle = () => import(/* webpackChunkName: "header-title" */'@/components/HeaderTitle');
    const SliderBackground = () => import(/* webpackChunkName: "slider-background" */'@/components/SliderBackground');
    const StaticBackground = () => import(/* webpackChunkName: "static-background" */'@/components/StaticBackground');
    const TenderTeaser = () => import(/* webpackChunkName: "tender-teaser" */'@/components/TenderTeaser');
    const ContactContent = () => import(/* webpackChunkName: "contact-content" */'@/components/ContactUs/ContactContent');
    const AdminPanelLayout = () => import(/* webpackChunkName: "admin-panel-layout" */'@/layouts/AdminPanel');

    export default {
        name: 'app',
        mixins: [routeNames, roles, errorAwareWithPreloading],
        components: {
            ContactContent,
            PageFooter,
            default: DefaultLayout,
            adminPanelLayout: AdminPanelLayout,
            HeaderTitle,
            SliderBackground,
            StaticBackground,
            TenderTeaser
        },
        computed: {
            ...mapState({
                adminPanel: state => state.adminPanel.adminPanel
            }),
            layout() {
                if ((this.adminPanel || this.$route.name.includes("admin")) && (this.isAdmin || this.isModerator)) {
                    return 'adminPanelLayout';
                }

                return 'default'
            },
            background() {
                if (this.$route.name === this.routeNames().ROUTE_HOME) {
                    return 'slider-background';
                }

                return 'static-background';
            },
            isHomePage() {
                return this.$route.name === this.routeNames().ROUTE_HOME;
            },
            isContactUsPage() {
                return this.$route.name === this.routeNames().ROUTE_CONTACT_US;
            }
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.AUTH_FETCH_ROLES);
        }
    }
</script>

<style>
    * {
        margin: 0;
    }
</style>
