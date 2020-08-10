<template>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col w-8/12 mx-auto"
          @submit.prevent="submitForm">
        <error-widget v-if="hasError"/>
        <br v-if="hasError"/>
        <template>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                           for="full_name">
                        {{$t('Full Name')}}
                    </label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="full_name" type="text" placeholder="Jane Smith" v-model="fullName" required/>
                    <p class="text-red text-xs italic">{{$t('This field is required')}}</p>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="password">
                        {{$t('Password')}}
                    </label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                        id="password" type="password" placeholder="******************" v-model="password" required/>
                    <p class="text-grey-dark text-xs italic">{{$t('This field is required')}}</p>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                        {{$t('E-mail')}}
                    </label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="email" type="text" placeholder="jane@example.com" v-model="email" required/>
                    <p class="text-red text-xs italic">{{$t('This field is required')}}</p>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="city">
                        {{$t('City')}}
                    </label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="city" type="text" placeholder="New York" v-model="city" required/>
                    <p class="text-red text-xs italic">{{$t('This field is required')}}</p>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <button
                        type="button"
                        @click="$router.go(-1)"
                        class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Back')}}</span>
                    </button>
                    <button
                        v-if="!editMode"
                        class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Create customer')}}</span>
                    </button>
                    <button
                        v-if="editMode"
                        class="cursor-pointer bg-teal-600 hover:bg-teal-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Update customer')}}</span>
                    </button>
                    <button
                        v-if="editMode"
                        @click="deleteUser"
                        type="button"
                        class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl px-5 py-4 inline-block text-teal-100 hover:text-white rounded">
                        <span>{{$t('Delete customer')}}</span>
                    </button>

                </div>
            </div>
        </template>
    </form>
</template>

<script>
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/admin/actions";
    import Preloader from "@/components/Widget/Preloader";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import routeNames from "@/router/routeNames";
    import {mapState} from "vuex";

    export default {
        name: "CustomerCreateForm",
        components: {ErrorWidget, Preloader},
        mixins: [errorAwareWithPreloading],
        data() {
            return {
                fullName: null,
                password: null,
                email: null,
                city: null,
                editMode: false
            }
        },
        computed: {
            ...mapState({
                currentUser: state => state.adminCustomer.currentUser
            })
        },
        methods: {
            async submitForm() {
                const userDto = {
                    full_name: this.fullName,
                    password: this.password,
                    email: this.email,
                    city: this.city
                };

                try {
                    if (this.editMode) {
                        await this.errorAwareStoreDispatch(Actions.UPDATE_CUSTOMER_USER, {
                            id: this.$route.params.id,
                            updateCustomerDto: userDto
                        });
                    } else {
                        await this.errorAwareStoreDispatch(Actions.CREATE_CUSTOMER_USER, userDto);
                    }
                } catch (e) {
                    return;
                }

                console.log('push: route_admin_customer_users_1');
                await this.$router.push({name: routeNames.ROUTE_ADMIN_CUSTOMER_USERS})
            },

            async deleteUser() {
                console.log('push: delete user');
                await this.errorAwareStoreDispatch(Actions.DELETE_CUSTOMER_USER, this.$route.params.id);
                await this.$router.push({name: routeNames.ROUTE_ADMIN_CUSTOMER_USERS});
            }
        },
        async mounted() {
            if (this.$route.params.id) {
                this.editMode = true;
            }

            if (this.editMode) {
                const userData = await this.errorAwareStoreDispatch(Actions.FETCH_CUSTOMER_USER, this.$route.params.id);
                const user = userData.data.data;

                this.fullName = user.full_name;
                this.password = user.password;
                this.email = user.email;
                this.city = user.city;
            }
        }
    }
</script>

<style scoped>

</style>
