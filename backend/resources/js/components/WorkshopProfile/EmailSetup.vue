<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <error-widget v-if="hasError"></error-widget>
        <success-widget v-if="!hasError"></success-widget>
        <preloader v-if="loading" />
        <form v-else>
            <div class="form-unit">
                <label>
                    {{ $t('You can type your new email in field below') }}:
                    <input type="text" class="input-type-text" v-model="updatableEmail"/>
                </label>
            </div>
            <button class="btn-orange-default" @click.prevent="changeEmail">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import Actions from "@/store/actions";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "EmailSetup",
        components: {Preloader, SuccessWidget, ErrorWidget},
        mixins: [errorAwareWithPreloading],
        data() {
            return {
                updatableEmail: null,
            }
        },
        methods: {
            async changeEmail() {
                await this.errorAwareStoreDispatch(
                    Actions.WORKSHOP_EMAIL_UPDATE,
                    this.updatableEmail,
                    this.$t('We sent you a confirmation letter. Please, check your current e-mail.')
                );
            }
        },
        watch: {
            currentEmail() {
                this.updatableEmail = JSON.parse(JSON.stringify(this.currentEmail));
            }
        },
        computed: {
            ...mapState({
                currentEmail: state => state.workshopProfile.currentEmail
            })
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.WORKSHOP_EMAIL_FETCH);
        }
    }
</script>

<style scoped>

</style>
