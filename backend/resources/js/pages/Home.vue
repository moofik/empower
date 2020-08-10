<template>
    <div>
        <section class="steps-container">
            <div class="steps flex-no-wrap flex flex-row justify-between">
                <div class="step">
                    <p class="icon"><img src="/images/icon1.png" alt=""></p>
                    <p class="title"><span class="highlight">Kilpailuta</span> korjaamot</p>
                    <p class="description">Kerro mikä autoasi vaivaa ja jätä maksuton tarjouspyyntö.</p>
                </div>

                <div class="step arrow">
                    <p><img src="/images/strelka.png" alt=""></p>
                </div>

                <div class="step">
                    <p class="icon"><img src="/images/icon2.png" alt=""></p>
                    <p class="title">Valitse <span class="highlight">Edullisin</span> Huolto</p>
                    <p class="description">Vertaa tarjouksia hinnan, sijainnin, ja arvostelujen perusteella ja valitse voittaja.</p>
                </div>

                <div class="step arrow">
                    <p><img src="/images/strelka2.png" alt=""></p>
                </div>

                <div class="step">
                    <p class="icon"><img src="/images/icon3.png" alt=""></p>
                    <p class="title"><span class="highlight">Huolla</span> autosi ja säästä selvää rahaa</p>
                    <p class="description">Autosi kuntoon - Ilman yllätyksiä.</p>
                </div>
            </div>
        </section>

        <section class="counters">
            <div class="blocks flex justify-between flex-no-wrap">
                <div class="step">
                    <p class="counter">
                        <ICountUp
                            :delay="1000"
                            :endVal="480"
                            :options="countUpOptions"
                        />
                    </p>
                    <p class="counter-description">Repair shops are already available in 5 cities</p>
                </div>
                <div class="step">
                    <p class="counter">
                        <ICountUp
                            :delay="1000"
                            :endVal="5413"
                            :options="countUpOptions"
                        />
                    </p>
                    <p class="counter-description">Mechanic, all makes and models</p>
                </div>
                <div class="step">
                    <p class="counter">
                        <ICountUp
                            :delay="1000"
                            :endVal="2099"
                            :options="countUpOptions"
                        />
                    </p>
                    <p class="counter-description">Satisfied customers</p>
                </div>
            </div>
            <div class="button-container flex flex-row justify-center">
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
        </section>

        <section class="choose-service flex flex-row">
            <div class="flex-1">
                <h5 class="menu-title">{{$t('CHOOSE')}}</h5>
                <p class="tab" :class='{active: carMakesActive}' @click="toggleTab">
                    <span v-if="carMakesActive" class="dash"></span>{{$t('CAR MAKE')}}
                </p>
                <p class="tab" :class='{active: !carMakesActive}' @click="toggleTab">
                    <span v-if="!carMakesActive" class="dash"></span>{{$t('OR SERVICE')}}
                </p>
            </div>
            <div class="flex-1">
                <ul class="links-list" v-if="carMakesActive">
                    <router-link
                        :key="carMake.name"
                        v-if="index < 10"
                        v-for="(carMake, index) in makes"
                        :to="{name: routeNames().ROUTE_FIND_WORKSHOP}"
                        tag="li"
                        exact
                    >
                        {{carMake.name}}
                    </router-link>
                    <router-link
                        :key="'manyOthersCarMakeUnique'"
                        :to="{name: routeNames().ROUTE_FIND_WORKSHOP}"
                        tag="li"
                        exact
                    >
                        {{ $t('Other') }}
                    </router-link>
                </ul>
                <ul class="links-list" v-else>
                    <router-link
                        :key="service.name"
                        v-for="service in services"
                        :to="{name: routeNames().ROUTE_FIND_WORKSHOP}"
                        tag="li"
                        exact
                    >
                        {{ $t(service.name) }}
                    </router-link>
                </ul>

            </div>
        </section>

        <reviews-widget />
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import routeNames from "@/services/mixin/routeNames";
    import ICountUp from 'vue-countup-v2';
    import Actions from '@/store/actions';
    import ReviewsWidget from "@/components/Reviews/ReviewsWidget";
    import redirectAuthenticated from '@/services/mixin/redirectAuthenticated';
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import roles from "@/services/mixin/roles";

    export default {
        name: "Home",
        mixins: [routeNames, redirectAuthenticated, errorAwareWithPreloading, roles],
        components: {
            ReviewsWidget,
            ICountUp
        },
        data() {
            return {
                countUpOptions: {
                    duration: 10,
                    useEasing: true,
                    useGrouping: true,
                    separator: ',',
                    decimal: '.',
                    prefix: '',
                    suffix: ''
                },
                carMakesActive: true,
            }
        },
        computed: {
            ...mapState({
                services: state => state.workshop.services,
                makes: state => state.workshop.makes
            })
        },
        methods: {
            toggleTab() {
                this.carMakesActive = !this.carMakesActive;
            }
        },
        created() {
            this.errorAwareStoreDispatch(Actions.MAIN_FETCH_SERVICES);
            this.errorAwareStoreDispatch(Actions.MAIN_FETCH_CAR_MAKES);
        }
    }
</script>

<style lang="scss" scoped>
    .steps-container {
        font-family: "SF UI Text Normal", sans-serif;
        padding: 115px 0;
        font-size: 18px;
        line-height: 1.2;
        background: linear-gradient(to right, #cdd4ca 0%, #ebc26c 100%);

        .steps {
            width: auto;
            padding: 0 50px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .step {
            max-width: 250px;
            padding-left: 15px;

            p {
                margin: 10px 0;
            }

            p:not(:first-child) {
                margin-left: 28px;

                .highlight {
                    color: #153e5c;
                }
            }

            .icon {
                margin-bottom: 20px;
            }

            .title {
                @apply uppercase .leading-tight;
                font-size: 30px;
                font-family: "SF UI Text Bold", sans-serif;
            }

            &.arrow {
                width: 136px;
                margin-top: 68px;
            }
        }
    }

    .counters {
        color: #cdd4ca;
        padding: 80px 0 64px 0;
        background: url('/images/car.jpg') center no-repeat;
        max-width: 1920px;
        margin: 0 auto;
        background-size: cover;
        -webkit-background-size: cover;

        .button-container {
            margin-top: 65px;
        }

        .blocks {
            width: auto;
            padding: 0 50px;
            max-width: 1300px;
            margin: 0 auto;

            .step {
                height: 325px;
                width: 215px;
                border: 2px solid #f2be54;
                border-left: none;
                position: relative;

                &::before {
                    position: absolute;
                    top: 0;
                    left: 0;
                    margin: 0;
                    padding: 0;
                    content: '';
                    width: 2px;
                    height: 65px;
                    background: #f2be54;
                }

                &::after {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    margin: 0;
                    padding: 0;
                    content: '';
                    width: 2px;
                    height: 65px;
                    background: #f2be54;
                }

                .counter {
                    position: absolute;
                    color: #fff;
                    font-family: "SF UI Text Bold", sans-serif;
                    font-size: 60px;
                    line-height: 1;
                    display: block;
                    padding: 29px 0;
                    top: 20%;
                    left: -20%;
                }

                .counter-description {
                    height: 50px;
                    color: #cdd4ca;
                    font-size: 16px;
                    position: absolute;
                    bottom: 27%;
                    left: -20%;
                    padding-right: 30px;
                }
            }
        }
    }

    .choose-service {
        font-family: "SF UI Text Regular", sans-serif;
        padding: 150px 0;
        color: #cdd4ca;
        max-width: 1200px;
        margin: 0 auto;

        ul {
            margin: 10px 0;
            padding: 0;

            li {
                list-style: circle;
                margin: 0 0 10px 0;
                padding: 0 0 0 20px;
            }
        }

        .links-list {
            font-size: 14px;
            color: #153e5c;
            outline: none;
            text-decoration: underline;
            cursor: pointer;
        }

        .menu-title {
            font-size: 41px;
            font-family: "SF UI Font Bold", sans-serif;
            font-weight: 700;
            line-height: 1.2;
            text-transform: uppercase;
            margin-left: 100px;
        }

        .tab {
            font-family: "SF UI Font Bold", sans-serif;
            font-size: 48px;
            color: #87aeb4;
            text-decoration: underline;
            margin-left: 100px;
            font-weight: 700;
            cursor: pointer;
            position: relative;

            &.active {
                color: #191a1d;
                text-decoration: none;
            }

            .dash {
                content: '';
                height: 3px;
                left: -15%;
                top: 50%;
                margin-top: -1px;
                background: #191a1d;
                position: absolute;
                display: block;
                z-index: 2;
                width: 60px;
            }
        }
    }
</style>
