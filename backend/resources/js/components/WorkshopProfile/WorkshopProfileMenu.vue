<template>
    <div class="flex flex-row bg-white justify-end w-2/5">
        <ul class="profile-menu mt-12 mb-12 pr-40">
            <li class="profile-menu-item" @click="$emit('way', 'workshop-basic-settings')"><font-awesome-icon icon="angle-right" /> {{ $t('Basic') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'services')"><font-awesome-icon icon="angle-right" /> {{ $t('Services') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'additional-services')"><font-awesome-icon icon="angle-right" /> {{ $t('Additional Services') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'makes')"><font-awesome-icon icon="angle-right" /> {{ $t('Makes and models') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'payment-options')"><font-awesome-icon icon="angle-right" /> {{ $t('Payment Options') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'schedule')"><font-awesome-icon icon="angle-right" /> {{ $t('Schedule') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'spare-parts')"><font-awesome-icon icon="angle-right" /> {{ $t('Spare Parts') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'warranty')"><font-awesome-icon icon="angle-right" /> {{ $t('Warranty') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'certificates')"><font-awesome-icon icon="angle-right" /> {{ $t('Certificates') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'logo-change')"><font-awesome-icon icon="angle-right" /> {{ $t('Change Logo') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'email-setup')"><font-awesome-icon icon="angle-right" /> {{ $t('Change Email') }}</li>
            <li class="profile-menu-item" @click="$emit('way', 'change-password')"><font-awesome-icon icon="angle-right" /> {{ $t('Change password') }}</li>
            <li class="profile-menu-item" @click="$router.push({name: routeNames().ROUTE_WORKSHOP, params: {id: userId}})"><font-awesome-icon icon="angle-right" /> {{ $t('Public profile') }}</li>
            <li class="profile-menu-item" @click="$emit('logout')"><font-awesome-icon icon="angle-right" /> {{ $t('Exit') }}</li>
        </ul>
    </div>
</template>

<script>
    import routeNames from "@/services/mixin/routeNames";
    import {mapState} from "vuex";

    export default {
        name: "WorkshopProfileMenu",
        mixins: [routeNames],
        computed: {
            ...mapState({
                userId: state => state.auth.userId
            })
        }
    }
</script>

<style lang="scss">
    .profile-menu {
        li {
            font-family: "SF UI Text Bold", sans-serif;
        }
    }

    .profile-menu-item {
        @apply p-2 uppercase cursor-pointer text-dk-blue;
    }
</style>
