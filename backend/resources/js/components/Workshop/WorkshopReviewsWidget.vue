<template>
    <div class="w-11/12">
        <h3 class="workshop-default-title">{{ $t('Reviews feed') }}</h3>
        <div class="guest-feedback" v-if="currentWorkshop && currentWorkshop.last_feedback">
            <p class="feedback-author float-left">
                {{ currentWorkshop.last_feedback.author }}
            </p>
            <p class="feedback-message">
                {{ currentWorkshop.last_feedback.text }}
            </p>
        </div>
        <div v-else-if="currentWorkshop && !currentWorkshop.last_feedback">
            {{ $t('Unfortunately no one has written a review yet') }}
        </div>
        <p v-if="currentWorkshop && currentWorkshop.last_feedback_rating" class="feed-rating">
            <star-rating
                :rating="parseFloat(currentWorkshop.last_feedback_rating)"
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
        <div class="flex flex-row justify-start">
            <div v-if="currentWorkshop && currentWorkshop.last_feedback" class="mr-2">
                <router-link
                    :to="{name: routeNames().ROUTE_WORKSHOP_REVIEWS, params: {id: workshopId}}"
                    tag="a"
                    class="btn-transparent-default btn-flat hover-white-on-blue"
                >
                    {{ $t('Show all') }}
                    <font-awesome-icon icon="angle-right"/>
                </router-link>
            </div>
            <div v-if="currentWorkshop && currentWorkshop.can_write_feedback">
                <router-link
                    :to="{name: routeNames().ROUTE_WORKSHOP_REVIEWS, params: {id: workshopId}}"
                    tag="a"
                    class="btn-transparent-default btn-flat hover-white-on-blue"
                >
                    {{ $t('Write review') }}
                    <font-awesome-icon icon="angle-right"/>
                </router-link>
            </div>
        </div>
        <p v-if="currentWorkshop && !currentWorkshop.can_write_feedback" class="feedback-warning">
            <font-awesome-icon :far="true" icon="comments"/>
            {{ $t('Only clients may leave reviews.') }}
        </p>
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    import {mapState} from 'vuex';
    import routeNames from "@/services/mixin/routeNames";

    export default {
        name: "WorkshopReviewsWidget",
        components: {StarRating},
        mixins: [routeNames],
        props: {
            workshopId: {
                type: Number,
                required: true
            }
        },
        computed: {
            ...mapState({
                currentWorkshop: state => state.workshop.currentWorkshop
            })
        }
    }
</script>

<style lang="scss">
    .post {
        font-family: "SF UI Text Regular", sans-serif;
        font-size: 14px;
        text-decoration: underline;
        margin-bottom: 20px;
        background: #f2be54;
        color: #153e5c;
        cursor: pointer;

        .post-title {
            padding: 15px 25px;
        }

        img {
            width: 100%;
            height: auto;
        }
    }

    .feedback-author, .feedback-message {
        font-family: "SF UI Font Regular", sans-serif;
        font-size: 13px;
    }

    .feedback-author {
        color: #6d6d6d;
        margin-right: 20px;
        text-align: center;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .guest-feedback {
        &::after {
            clear: both;
        }
    }

    .feedback-warning {
        margin-top: 15px;
    }
</style>
