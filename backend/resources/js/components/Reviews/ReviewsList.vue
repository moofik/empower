<template>
    <div class="outer-review-container">
        <div class="default-container mx-auto">
            <preloader v-if="loading"/>
            <h3 v-if="!loading" class="text-center mt-8 xs:mb-12 sm:mb-24">{{ $t('Reviews') }}</h3>

            <div v-if="!loading && reviews.length === 0" class="flex flex-row justify-center mb-8">
                <div class="review-message">
                    {{$t('Unfortunately no one has written a review yet')}}
                </div>
            </div>
            <div
                v-if="!loading"
                v-for="(review, index) in reviews"
                class="review my-12 flex flex-row">

                <div class="review-image-container w-3/12">
                    <img v-if="review.image && review.image.url" :src="'/'+review.image.url" class="review-image">
                    <img v-else src="/images/no-image.png" class="review-image">
                </div>

                <div class="w-9/12">
                    <div class="review-author">
                        <span class="author">{{review.author}}</span>
                    </div>

                    <div v-html="review.text" class="review-message"></div>

                    <div class="review-rating">
                        <star-rating
                            :read-only="true"
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
                    </div>

                    <div v-if="isAdmin || isModerator">
                        <ReviewsListAdminActions @updateData="updateData" :review="review" />
                    </div>
                </div>
            </div>

            <div v-if="currentWorkshop && currentWorkshop.can_write_feedback" class="text-center review-button">
                <button class="btn-orange-default" @click="openLeaveReviewForm">
                    {{$t('Leave your own review')}}
                </button>
            </div>

            <leave-review-form
                v-if="this.$route.params.id"
                @close="closeLeaveReviewForm"
                @reviewSent="updateReviewList"
                :is-active="isLeaveReviewFormActive"
                :workshop-id="parseInt(this.$route.params.id)"
            />

            <div v-if="reviews.length > 0" class="flex flex-col items-center">
                <paginate
                    v-if="paginationMetadata"
                    v-model="currentPage"
                    :pageCount="paginationMetadata.last_page"
                    :containerClass="'pagination'"
                    :clickHandler="paginationCallback">
                </paginate>
            </div>
        </div>
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    import {mapState} from 'vuex';
    import Actions from "@/store/actions";
    import routeNames from "@/services/mixin/routeNames";
    import LeaveReviewForm from "@/components/Reviews/LeaveReviewForm";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Preloader from "@/components/Widget/Preloader";
    import pagination from "@/services/mixin/pagination";
    import ReviewsListAdminActions from "@/components/Reviews/Admin/ReviewsListAdminActions";
    import roles from "@/services/mixin/roles";

    export default {
        name: "ReviewsList",
        mixins: [routeNames, errorAwareWithPreloading, pagination, roles],
        components: {ReviewsListAdminActions, Preloader, LeaveReviewForm, StarRating},
        data() {
            return {
                isLeaveReviewFormActive: false
            }
        },
        props: {
            limit: {
                type: Number,
                required: true
            }
        },
        computed: {
            ...mapState({
                reviews: state => state.feedback.reviews,
                currentWorkshop: state => state.workshop.currentWorkshop
            })
        },
        methods: {
            async updateData() {
                if (!this.$route.params.id) {
                    await this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH, {
                        page: this.currentPage,
                        perPage: this.limit
                    });
                    return;
                }

                const workshopId = parseInt(this.$route.params.id);
                await this.errorAwareStoreDispatch(Actions.WORKSHOP_FETCH, {id: workshopId});
                await this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH_FOR_WORKSHOP, {
                    id: workshopId,
                    page: this.currentPage,
                    perPage: this.limit
                });
            },
            async paginationCallback(page) {
                this.preparePagination(page);

                if (!this.$route.params.id) {
                    await this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH, {
                        page: this.currentPage,
                        perPage: this.limit
                    });
                    return;
                }

                const workshopId = parseInt(this.$route.params.id);
                this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH_FOR_WORKSHOP, {
                    id: workshopId,
                    page: this.currentPage,
                    perPage: this.limit
                });
            },
            async updateReviewList() {
                this.closeLeaveReviewForm();

                if (!this.$route.params.id) {
                    await this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH, {
                        page: this.currentPage,
                        perPage: this.limit
                    });
                    return;
                }

                const workshopId = parseInt(this.$route.params.id);
                await this.errorAwareStoreDispatch(Actions.WORKSHOP_FETCH, {id: workshopId});
                await this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH_FOR_WORKSHOP, {
                    id: workshopId,
                    page: this.currentPage,
                    perPage: this.limit
                });
            },
            openLeaveReviewForm() {
                this.isLeaveReviewFormActive = true;
            },
            closeLeaveReviewForm() {
                this.isLeaveReviewFormActive = false;
            }
        },
        async mounted() {
            if (!this.$route.params.id) {
                await this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH, {
                    page: this.currentPage,
                    perPage: this.limit
                });
                return;
            }

            const workshopId = parseInt(this.$route.params.id);
            await this.errorAwareStoreDispatch(Actions.WORKSHOP_FETCH, {id: workshopId});
            await this.errorAwareStoreDispatch(Actions.REVIEWS_FETCH_FOR_WORKSHOP, {
                id: workshopId,
                page: this.currentPage,
                perPage: this.limit
            });
        }
    }
</script>

<style lang="scss">
    .outer-review-container {
        background: linear-gradient(to right, #f4f9f1 0%, #fff 100%);
        padding-top: 20px;
        height: fit-content;

        .default-container {
            padding-bottom: 8rem;
        }
    }

    .padding-right-40 {
        padding-right: 40%
    }

    .padding-left-40 {
        padding-left: 40%;
    }

    .review-author {
        font-family: "SF UI Text Light Italic", sans-serif;
        color: #444;
        margin-bottom: 5px;
    }

    .review-image-container {
        max-height: 250px;
        overflow: hidden;
    }

    .review-image {
        width: 250px;
        height: auto;
        margin-right: 5px;
    }
</style>
