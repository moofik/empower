<template>
    <section class="customer-feedback">
        <div class="feedback-container">
            <h6 class="lowercase">{{$t('customer review')}}</h6>
            <div class="swiper-wrapper-custom">
                <swiper :options="swiperOption" ref="feedback-swiper">
                    <swiper-slide :key="review.id" v-for="review in reviews">
                        <div class="feed">
                            <p v-html="review.text" class="feed-message"></p>
                            <p class="feed-author">{{ review.author }}</p>
                            <p class="feed-rating">
                                <star-rating
                                    :rating="parseFloat(review.rating)"
                                    :increment="0.5"
                                    :star-size="16"
                                    inactive-color="#fff"
                                    active-color="#f1c101"
                                    border-color="#f1c101"
                                    :rounded-corners="true"
                                    :border-width="2"
                                    text-class="rounded-b-sm rounded-t-sm rounded-l-sm rounded-r-sm"
                                />
                            </p>
                        </div>
                    </swiper-slide>
                    <div class="swiper-pagination" slot="pagination"></div>
                </swiper>
            </div>
            <div class="all-reviews-link">
                <router-link :to="{name: routeNames().ROUTE_REVIEWS}" tag="a" class="all-reviews-link">
                    {{ $t('or read all reviews') }}
                </router-link>
            </div>
        </div>
    </section>
</template>

<script>
    import {mapState} from 'vuex';
    import StarRating from 'vue-star-rating';
    import Actions from '@/store/actions';
    import routeNames from "@/services/mixin/routeNames";

    export default {
        name: "ReviewsWidget",
        mixins: [routeNames],
        components: {
            StarRating
        },
        computed: {
            ...mapState({
                reviews: state => state.feedback.reviews
            })
        },
        data() {
            return {
                swiperOption: {
                    pagination: {
                        el: '.swiper-pagination',
                        type: 'bullets',
                        clickable: true
                    }
                }
            }
        },
        created() {
            this.$store.dispatch(Actions.REVIEWS_FETCH, {
                page: 1,
                perPage: 3
            });
        }
    }
</script>

<style scoped lang="scss">
    .customer-feedback {
        background: linear-gradient(to right, #f4f9f1 0%, #fff 100%);
        max-width: 1920px;
        height: 550px;
        max-height: 550px;

        .feedback-container {
            width: auto;
            padding: 0 50px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;

            h6 {
                width: 350px;
                padding-top: 50px;
                padding-left: -100px;
                font-size: 48px;
                line-height: 1;
                z-index: 15;
                font-family: "SF UI Text Bold", sans-serif;
            }
        }


        .feed {
            display: flex;
            flex-direction: column;
            margin-left: 50px;

            .feed-message, .feed-author {
                font-family: "SF UI Text Regular", sans-serif;
                font-size: 14px;
                margin: 5px 5px;
            }

            .feed-rating {
                margin: 5px 0;
            }

            .feed-author {
                color: #a0ad9b;
                margin-bottom: 0;
            }
        }
    }

    .all-reviews-link {
        margin-top: 20px;

        a {
            font-size: 14px;
            color: #153e5c;
            text-decoration: underline;
            cursor: pointer;

            &:hover {
                text-decoration: none;
            }
        }
    }
</style>
