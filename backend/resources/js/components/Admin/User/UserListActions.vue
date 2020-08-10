<template>
    <router-link v-if="isAdmin" tag="a" :to="{name: routeNames().ROUTE_ADMIN_USERS_CREATE}" class="cursor-pointer bg-gray-700 hover:bg-gray-600
                px-5 py-2 inline-block text-blue-100
                hover:text-white rounded">
        {{$t('Create moderator')}}
    </router-link>
</template>

<script>
    import routeNames from "@/services/mixin/routeNames";
    import roles from "@/services/mixin/roles";

    export default {
        name: "UserListActions",
        mixins: [routeNames, roles]
    }
</script>

<style scoped>

</style>
