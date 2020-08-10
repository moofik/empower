<template>
    <div>
        <div class="pre-footer"></div>
        <footer class="flex flex-row justify-center footer-width">
            <div class="flex flex-1 flex-col menu">
                <h6>{{ $t('Information') }}</h6>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('Service Warranty') }}
                </router-link>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('Privacy') }}
                </router-link>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('Trademark') }}
                </router-link>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('Terms of Service') }}
                </router-link>
            </div>
            <div class="flex flex-1 flex-col menu">
                <h6>{{ $t('Menu') }}</h6>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('About Us') }}
                </router-link>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('Press') }}
                </router-link>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('Affiliates') }}
                </router-link>
                <router-link :to="{name: routeNames().ROUTE_HOME}" tag="a" class="flex-1 outline-none underline">
                    {{ $t('Jobs') }}
                </router-link>
            </div>
            <div class="flex-1">
                <div class="flex flex-row social">
                    <a href="#" target="_blank">
                        <font-awesome-icon :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
                    </a>
                    <a href="#" target="_blank">
                        <font-awesome-icon :icon="{ prefix: 'fab', iconName: 'youtube' }"/>
                    </a>
                    <a href="#" target="_blank">
                        <font-awesome-icon :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
                    </a>
                    <a href="#" target="_blank">
                        <font-awesome-icon :icon="{ prefix: 'fab', iconName: 'linkedin-in' }"/>
                    </a>
                </div>
                <p class="social">{{ $t('Follow us in Somessa') }}</p>
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
            <div class="flex-1">
                <p class="phone">{{ $t('09 7258 4400') }}
                    <br/>
                    <span>{{ $t('Tel') }}</span>
                    <font-awesome-icon icon="phone"/>
                </p>
                <br/>
                <p class="copyright">
                    {{ $t('© 2019 AL.FI All rights reserved.') }}
                </p>
            </div>
        </footer>
    </div>
</template>

<script>
    import routeNames from '@/services/mixin/routeNames';
    import roles from "@/services/mixin/roles";

    export default {
        name: "PageFooter",
        mixins: [routeNames, roles]
    }
</script>

<style lang="scss" scoped>
    .pre-footer {
        content: "";
        display: block;
        height: 13px;
        width: 100%;
        font-size: 1px;
        background: url('/images/reshetka.gif') repeat-x;
    }

    .footer-width {
        margin: 0 auto;
        max-width: 1200px;
        padding: 65px 50px;
    }

    .menu {
        font-size: 13px;

        h6 {
            margin: 10px 0;
            text-transform: uppercase;
            font-family: 'SF UI Text Bold', sans-serif;
        }

        a {
            margin: 5px 0;
            color: #153e5c;
            font-family: 'SF UI Text Normal', sans-serif;
        }
    }

    .phone:first-line {
        letter-spacing: -1px;
        font-size: 30px;
        line-height: 1.2;
        font-family: 'SF UI Text Bold', sans-serif;
    }

    .phone {
        color: #153e5c;
        margin: 10px 0;
        font-family: 'SF UI Text Normal', sans-serif;
        font-size: 13px;
    }

    .copyright {
        font-family: 'SF UI Text Normal', sans-serif;
        font-size: 12px;
    }

    .social {
        color: #153e5c;
        margin: 10px 0;
        font-size: 13px;

        a {
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
            text-transform: uppercase;
            border: 1px solid #153e5c;
            border-radius: 100%;
            width: 35px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            margin-bottom: 10px;
            transition: 0.2s;

            &:hover {
                background: #153e5c;
                color: #FFF;
            }
        }
    }
</style>
