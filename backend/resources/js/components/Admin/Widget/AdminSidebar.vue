<template>
    <div id="sidebar" class="h-screen w-16 menu bg-white text-white px-4 flex items-center nunito static fixed shadow">

        <ul class="list-reset ">
            <li v-if="isAdmin" class="my-2 md:my-0">
                <router-link tag="a" :to="{name: routeNames().ROUTE_ADMIN_USERS}"
                             class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <font-awesome-icon icon="users"/>
                    <span class="w-full inline-block ml-3 pb-1 md:pb-0 text-sm">{{$t('Admin users')}}</span>
                </router-link>
            </li>
            <li v-if="isAdmin || isModerator" class="my-2 md:my-0 ">
                <router-link tag="a" :to="{name: routeNames().ROUTE_ADMIN_SHOPS}"
                             class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <font-awesome-icon icon="store"/>
                    <span class="w-full inline-block ml-3 pb-1 md:pb-0 text-sm">{{$t('Workshops')}}</span>
                </router-link>
            </li>
            <li v-if="isAdmin || isModerator" class="my-2 md:my-0">
                <router-link tag="a" :to="{name: routeNames().ROUTE_ADMIN_CUSTOMER_USERS}"
                             class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <font-awesome-icon icon="user"/>
                    <span class="w-full inline-block ml-3 pb-1 md:pb-0 text-sm">{{$t('Customers')}}</span>
                </router-link>
            </li>
            <li v-if="isAdmin || isModerator" class="my-2 md:my-0">
                <router-link tag="a" :to="{name: routeNames().ROUTE_ADMIN_REPAIR_REQUESTS}"
                             class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <font-awesome-icon icon="wrench"/>
                    <span class="w-full inline-block ml-3 pb-1 md:pb-0 text-sm">{{$t('Repair requests')}}</span>
                </router-link>
            </li>
            <li v-if="isAdmin || isModerator" class="my-2 md:my-0">
                <a
                    @click="navigateHome"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <font-awesome-icon icon="arrow-circle-left"/>
                    <span class="w-full inline-block ml-3 pb-1 md:pb-0 text-sm">{{$t('Back to site')}}</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    import routeNames from "@/services/mixin/routeNames";
    import roles from "@/services/mixin/roles";
    import routes from "@/router/routeNames";
    import Mutations from "@/store/admin/mutations";

    export default {
        name: "AdminSidebar",
        mixins: [routeNames, roles],
        methods: {
            async navigateHome() {
                try {
                    this.$store.commit(Mutations.ADMIN_PANEL_DISABLE);
                    await this.$router.push({name: routes.ROUTE_HOME});
                } catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>

<style scoped>
    .nunito {
        font-family: 'Source Sans Pro', sans-serif;
    }

    .border-b-1 {
        border-bottom-width: 1px;
    }

    .border-l-1 {
        border-left-width: 1px;
    }

    hover\:border-none:hover {
        border-style: none;
    }

    #sidebar {
        transition: ease-in-out all .3s;
        z-index: 9999;
    }

    #sidebar span {
        opacity: 0;
        position: absolute;
        transition: ease-in-out all .1s;
    }

    #sidebar:hover {
        width: 150px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        /*shadow-2xl*/
    }

    #sidebar:hover span {
        opacity: 1;
    }
</style>
