<template>
    <section class="registration-form animated fadeInDown">
        <div class="registration-container">
            <h1>{{ $t('Do you own a repair shop?') }}<br><span class="text-deep-orange">{{ $t('Sign Up') }}</span></h1>
            <div class="relative block flex flex-col md:flex-row items-center">
                <form @submit.prevent="registerUser"
                      class="w-1/2 max-w-full sm:w-full lg:w-1/2 sm:my-5 my-8 relative z-0 md:-mr-4">

                    <div v-for="(value, index) in errors" v-if="value[0] !== undefined" class="text-red-900">
                        {{value[0]}}
                    </div>

                    <div class="form-group-row">
                        <div class="form-unit">
                            <label for="email" class="form-default-label">{{ $t('Email') }}</label>
                            <input type="email" name="email" id="email" v-model="email"
                                   class="input-type-text required"
                                   autocomplete="email" required>
                        </div>
                        <div class="form-unit">
                            <label for="password" class="form-default-label">{{ $t('Password') }}</label>
                            <input type="password" name="password" id="password" v-model="password"
                                   class="input-type-text required"
                                   autocomplete="password" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-unit">
                            <label for="workshop_name" class="form-default-label">{{ $t('Shop name') }}</label>
                            <input type="text" name="workshop_name" id="workshop_name" v-model="workshop_name"
                                   class="input-type-text required"
                                   autocomplete="workshop_name" required>
                        </div>
                        <div class="form-unit">
                            <label for="full_name" class="form-default-label">{{ $t('Your name') }}</label>
                            <input type="text" name="full_name" id="full_name" v-model="full_name"
                                   class="input-type-text required"
                                   autocomplete="full_name" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-unit">
                            <label for="city" class="form-default-label">{{ $t('City') }}</label>
                            <input type="text" name="city" id="city" v-model="city"
                                   class="input-type-text required"
                                   autocomplete="city" required>
                        </div>
                        <div class="form-unit">
                            <label for="workshop_address" class="form-default-label">{{ $t('Shop address') }}</label>
                            <input type="text" name="workshop_address" id="workshop_address" v-model="workshop_address"
                                   class="input-type-text required"
                                   autocomplete="workshop_address" required>
                        </div>
                    </div>
                    <div class="form-note">
                        {{ $t('All fields are required.') }}
                    </div>
                    <div class="form-big-unit">
                        <label class="flex justify-start items-start">
                            <div
                                :class="{'bg-deep-blue': agreement, 'bg-white': !agreement}"
                                class="border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                <input name="agreement" v-model="agreement" type="checkbox" class="opacity-0 absolute" required>
                            </div>
                            <div class="select-none">
                                {{ $t('I have read and accept') }}
                                <a href="http://alfi.local/privacy-policy" target="_blank">
                                    {{ $t('the privacy policy') }}
                                </a> {{ $t('and') }}
                                <a href="http://alfi.local/terms-of-use" target="_blank">{{ $t('terms of use') }}</a>.
                            </div>
                        </label>
                        <button type="submit" class="btn-orange-default">{{ $t('Submit') }}
                            <font-awesome-icon icon="angle-right"/>
                        </button>
                    </div>
                </form>
                <div class="w-1/2 max-w-full sm:w-full lg:w-1/2 sm:my-5 my-8 relative z-0 md:-mr-4">
                    <img src="/images/man.jpg"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Actions from '@/store/actions';
    import {mapActions} from 'vuex';

    export default {
        name: "WorkshopRegistrationForm",
        props: {
            autologin: Boolean /* Defines whether to login or not after registration */
        },
        data() {
            return {
                email: null,
                password: null,
                workshop_name: null,
                full_name: null,
                city: null,
                workshop_address: null,
                agreement: null,
                errors: null
            }
        },
        methods: {
            async registerUser() {
                const createWorkshopDto = {
                    email: this.email,
                    password: this.password,
                    workshop_name: this.workshop_name,
                    workshop_address: this.workshop_address,
                    full_name: this.full_name,
                    city: this.city
                };

                try {
                    await this.$store.dispatch(Actions.AUTH_REGISTER_WORKSHOP, createWorkshopDto);
                    this.errors = null;
                    this.$emit('registered');
                } catch(e) {
                    if (e.response.data && e.response.data.detail) {
                        this.errors = e.response.data.detail;
                    }
                }

                if (this.autologin) {
                    console.log('autologin');
                    try {
                        await this.$store.dispatch(Actions.AUTH_LOGIN, {username: this.email, password: this.password});
                        this.$emit('logged-in');
                    } catch (e) {
                        console.log(e);
                    }
                }
            }
        }
    }
</script>

<style lang="scss">
    .registration-form {
        padding: 30px 0;
    }

    .registration-container {
        width: auto;
        padding: 0 50px;
        max-width: 1200px;
        margin: 0 auto;

        h1 {
            span {
                font-family: inherit;
            }
        }
    }

    .bg-deep-blue {
        background: #153e5c;
    }
</style>
