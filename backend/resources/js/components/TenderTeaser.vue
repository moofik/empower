<template>
    <div class="tender-teaser">
        <div class="teaser-title">
            {{ $t('Do it Like 3 Customers') }}<br/>
            {{ $t('Save up to 20-40% - Easy, hassle-free and of course completely free.') }}
        </div>
        <vue-typed-js :loop="true" :backSpeed="40" :showCursor="false"
                      :strings="['<p class=\'font-bold text-deep-orange\'>' + $t('Save money on') + '</p><p class=\'font-bold text-white\'>' + $t('your car maintenance') + '</p>', '<span></span>']"
                      :contentType="'html'">
            <h2 class="typing height-150 font-size-48 leading-none mt-2 mb-2"></h2>
        </vue-typed-js>
        <router-link v-if="isWorkshop" :to="{name: routeNames().ROUTE_HUB_REPAIR_REQUEST_LIST}" tag="a" class="btn-orange-default" exact>
            {{ $t('Find a repair request') }}
            <font-awesome-icon icon="angle-right"/>
        </router-link>
        <router-link v-else-if="isUser" :to="{name: routeNames().ROUTE_REQUEST_REPAIR}" tag="a" class="btn-orange-default" exact>
            {{ $t('Request repair') }}
            <font-awesome-icon icon="angle-right"/>
        </router-link>
        <router-link v-else :to="{name: routeNames().ROUTE_USER_REGISTER}" tag="a" class="btn-orange-default" exact>
            {{ $t('Request repair') }}
            <font-awesome-icon icon="angle-right"/>
        </router-link>
    </div>
</template>

<script>
    import routeNames from '@/services/mixin/routeNames';
    import roles from "@/services/mixin/roles";

    export default {
        name: "TenderTeaser",
        mixins: [routeNames, roles]
    }
</script>

<style lang="scss">
    svg:not(:root).svg-inline--fa {
        margin-left: 2px;
        display: inline;
        vertical-align: text-top;
    }

    .height-150 {
        height: 150px;
    }

    .font-size-48 {
        font-size: 48px;
    }

    .tender-teaser {
        @apply absolute top-188 right-50p z-30 w-1/2 text-pale leading-none;
        padding: 50px 50px 50px 0;
        border: 2px solid black;
        border-left-width: 0;
        max-width: 430px;
        font-family: "SF UI Text Normal", sans-serif;

        .typing {
            font-family: "SF UI Text Bold", sans-serif;
        }
    }

    .btn-deep-orange:hover {
        @apply bg-white;
    }

    .teaser-title {
        margin: 2px 0;
    }
</style>
