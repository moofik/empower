<template>
    <div v-if="isActive" class="fixed top-0 left-0 w-full h-full flex z-50 justify-center items-center">
        <div class="w-full h-full fixed backdrop z-40"></div>
        <div
            class="main-modal border border-teal-500 shadow-lg fixed
            bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="flex justify-between items-center pb-3">
                <p class="text-xl font-bold">{{ $t('Sign In') }}</p>
                <div @click="$emit('close')" class="modal-close cursor-pointer z-50">
                    <font-awesome-icon icon="times-circle"/>
                </div>
            </div>
            <!--Body-->
            <div v-for="(value, index) in errors" v-if="!value[0] !== undefined" class="text-red-900">
                {{ value[0]}}
            </div>
            <form @submit.prevent="signIn">
                <div class="form-group-row">
                    <div class="form-unit w-full xs:w-full sm:w-full">
                        <label for="email" class="form-default-label">{{ $t('Email') }}</label>
                        <input type="text" name="email" id="email" v-model="email"
                               class="input-type-text xs:w-full sm:w-full required"
                               autocomplete="email" required>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-unit xs:w-full sm:w-full">
                        <label for="password" class="form-default-label">{{ $t('Password') }}</label>
                        <input type="password" name="password" id="password" v-model="password"
                               class="input-type-text xs:w-full sm:w-full required"
                               autocomplete="password" required>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="btn-orange-default">{{ $t('Login') }}
                        <font-awesome-icon icon="angle-right"/>
                    </button>
                </div>
                <div class="form-group-row text-justify mt-1">
                    <div class="form-unit">
                        <router-link :to="{name: routeNames().ROUTE_USER_REGISTER}" tag="a" class="form-link" exact>
                            <span @click="$emit('close')">{{ $t('Register') }}</span>
                        </router-link>
                    </div>
                    <div class="form-unit">
                        <router-link :to="{name: routeNames().ROUTE_WORKSHOP_REGISTER}" tag="a" class="form-link" exact>
                            <span @click="$emit('close')">{{ $t('Register a workshop') }}</span>
                        </router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Actions from '@/store/actions';
    import routeNames from "@/services/mixin/routeNames";

    export default {
        name: "LoginForm",
        mixins: [routeNames],
        props: {
            isActive: Boolean
        },
        data() {
            return {
                email: null,
                password: null,
                errors: null
            }
        },
        methods: {
            async signIn() {
                const loginDto = {
                    username: this.email,
                    password: this.password
                };

                try {
                    await this.$store.dispatch(Actions.AUTH_LOGIN, loginDto);
                    this.$emit('logged-in');
                } catch(e) {
                    if (e.response.data && e.response.data.detail) {
                        this.errors = e.response.data.detail;
                    }
                }
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
        width: 310px;
        padding: 15px 20px;
    }

    .backdrop {
        background: rgba(21, 62, 92, .8);
        left: 0;
        top: 0;
    }
</style>
