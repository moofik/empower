<template>
    <div v-if="isActive" class="fixed top-0 left-0 xs:w-full sm:w-full h-full flex z-50 justify-center items-center">
        <div class="xs:w-full sm:w-full h-full fixed backdrop z-40"></div>
        <div
            class="main-modal border border-teal-500 shadow-lg fixed
            bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="flex justify-between items-center pb-3">
                <p class="font-size-17 font-bold">
                    {{ $t('Leave your review') }}
                </p>
                <div @click="$emit('close')" class="modal-close cursor-pointer z-50">
                    <font-awesome-icon icon="times-circle"/>
                </div>
            </div>

            <form @submit.prevent="send">
                <div class="form-group-row">
                    <div class="form-unit xs:w-full sm:w-full">
                        <label for="image" class="form-default-label">
                            {{ $t('Attach photo (optional)') }}
                        </label>
                        <input class="input-type-text bg-white" id="image" type="file" @change="addFile($event.target.files[0])" />
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-unit xs:w-full sm:w-full">
                        <label for="comment" class="form-default-label">
                            {{ $t('Write your review') }}
                        </label>
                        <textarea name="comment" id="comment" v-model="comment"
                                  class="input-type-text xs:w-full sm:w-full required"
                                  autocomplete="comment" required rows="3">
                        </textarea>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="button" class="btn-orange-default" @click="sendReview">
                        {{ $t('Send') }}
                        <font-awesome-icon icon="angle-right"/>
                    </button>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        name: "LeaveReviewForm",
        mixins: [errorAwareWithPreloading],
        components: {
            StarRating
        },
        props: {
            isActive: Boolean,
            workshopId: {
                type: Number,
                required: true
            }
        },
        data() {
            return {
                file: null,
                image: null,
                comment: null,
                errors: null
            }
        },
        methods: {
            addFile(file) {
                if (typeof file === "undefined") {
                    return;
                }

                this.file = file;
            },
            async sendReview() {
                let reader = new FileReader();
                let vm = this;

                reader.onload = async (e) => {
                    vm.image = e.target.result;
                    vm.file = null;
                };

                try {
                    await reader.readAsDataURL(this.file);
                } catch (e) {}

                const feedbackDto = {
                    id: vm.workshopId,
                    text: vm.comment,
                    image: vm.image
                };

                await vm.errorAwareStoreDispatch(Actions.REVIEWS_SEND, feedbackDto);

                vm.$emit('reviewSent');
            }
        }
    }
</script>

<style scoped>
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    .animated.faster {
        -webkit-animation-duration: 500ms;
        animation-duration: 500ms;
    }

    .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }

    .fadeOut {
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    .main-modal {
        border: 5px solid #f2be54;
        border-radius: 15px;
        width: 30rem;
        padding: 15px 20px;
    }

    .backdrop {
        background: rgba(21, 62, 92, .8);
        left: 0;
        top: 0;
    }

    .font-size-17 {
        font-size: 17px;
    }
</style>
