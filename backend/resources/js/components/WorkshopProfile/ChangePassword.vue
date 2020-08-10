<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading" />
        <form v-else>
            <div class="form-unit">
                <label>
                    {{ $t('Old password') }}:
                    <input type="text" class="input-type-text" v-model="oldPassword"/>
                </label>
            </div>
            <div class="form-unit">
                <label>
                    {{ $t('New password') }}:
                    <input type="text" class="input-type-text" v-model="password"/>
                </label>
            </div>
            <div class="form-unit">
                <label>
                    {{ $t('Repeat password') }}:
                    <input type="text" class="input-type-text" v-model="passwordConfirmation"/>
                </label>
            </div>
            <button class="btn-orange-default" @click.prevent="changePassword">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import Actions from "@/store/actions";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Preloader from "@/components/Widget/Preloader";
    import SuccessWidget from "@/components/Widget/SuccessWidget";

    export default {
        name: "ChangePassword",
        components: {
            SuccessWidget,
            Preloader,
            ErrorWidget
        },
        mixins: [errorAwareWithPreloading],
        data() {
            return {
                oldPassword: '',
                password: '',
                passwordConfirmation: ''
            }
        },
        methods: {
            async changePassword() {
                const updatePasswordDto = {
                    old_password: this.oldPassword,
                    password: this.password,
                    password_confirmation: this.passwordConfirmation
                };

                await this.errorAwareStoreDispatch(
                    Actions.WORKSHOP_PASSWORD_UPDATE,
                    updatePasswordDto,
                    this.$t('Your password has been successfully updated.')
                );
            }
        }
    }
</script>

<style scoped>

</style>
