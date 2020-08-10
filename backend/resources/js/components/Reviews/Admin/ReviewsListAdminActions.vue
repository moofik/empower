<template>
    <div class="w-11/12">
        <h3 class="workshop-default-title">{{ $t('Admin actions') }}</h3>
        <button type="button"
                class="cursor-pointer bg-gray-700 hover:bg-gray-600 px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
                @click="$router.go(-1)"
        >
            {{$t('Back')}}
        </button>
        <button type="button"
                class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"
                @click="deleteReview"
        >
            {{$t('Delete')}}
        </button>
    </div>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/actions";

    export default {
        name: "ReviewsListAdminActions",
        mixins: [errorAwareWithPreloading],
        props: {
            review: {
                type: Object,
                required: true
            }
        },
        methods: {
            async deleteReview() {
                console.log(this.review.id);
                await this.errorAwareStoreDispatch(Actions.REVIEWS_DELETE, this.review.id);
                this.$emit('updateData');
            }
        }
    }
</script>

<style scoped>

</style>
