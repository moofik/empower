<template>
    <nav class="main-nav">
        <mq-layout mq="md+">
            <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" active-class="active" exact>
                {{ $t('Home') }}
            </router-link>
            <router-link :to="{name: routeNames().ROUTE_BLOG}" tag="a" active-class="active" exact>
                {{ $t('Blog') }}
            </router-link>
            <router-link :to="{name: routeNames().ROUTE_FIND_WORKSHOP}" tag="a" active-class="active">
                {{ $t('Find a workshop') }}
            </router-link>
            <router-link v-if="!isAuthenticated" :to="{name: routeNames().ROUTE_USER_REGISTER}" tag="a" active-class="active" exact>
                {{ $t('Register user') }}
            </router-link>
            <router-link v-if="!isAuthenticated" :to="{name: routeNames().ROUTE_WORKSHOP_REGISTER}" tag="a" active-class="active" exact>
                {{ $t('Register a workshop') }}
            </router-link>
            <router-link v-if="isAuthenticated && isWorkshop" :to="{name: routeNames().ROUTE_INCOMING_REPAIR_REQUEST_LIST}" tag="a" active-class="active" exact>
                {{ $t('Incoming requests') }}
            </router-link>
            <router-link v-if="isAuthenticated && isWorkshop" :to="{name: routeNames().ROUTE_HUB_REPAIR_REQUEST_LIST}" tag="a" active-class="active" exact>
                {{ $t('Requests hub') }}
            </router-link>
            <router-link v-if="isAuthenticated && isUser" :to="{name: routeNames().ROUTE_REQUEST_REPAIR}" tag="a" active-class="active" exact>
                {{ $t('Request repair') }}
            </router-link>
            <router-link v-if="isAuthenticated && isUser" :to="{name: routeNames().ROUTE_USER_REQUESTS}" tag="a" active-class="active" exact>
                {{ $t('My requests') }}
            </router-link>
            <router-link v-if="isAuthenticated && isWorkshop" :to="{name: routeNames().ROUTE_OFFERED_REPAIR_REQUEST_LIST}" tag="a" active-class="active" exact>
                {{ $t('My offers') }}
            </router-link>
            <router-link :to="{name: routeNames().ROUTE_CONTACT_US}" tag="a" active-class="active" exact>
                {{ $t('Contact us') }}
            </router-link>
        </mq-layout>
    </nav>
</template>

<script>
    import routeNames from "@/services/mixin/routeNames";
    import isAuthenticated from "@/services/mixin/isAuthenticated";
    import roles from "@/services/mixin/roles";

    export default {
        name: "Navigation",
        mixins: [routeNames, isAuthenticated, roles]
    }
</script>

<style scoped>

</style>
