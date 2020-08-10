<template>
    <div class="flex justify-center xs:flex-col md:pt-56 sm:pb-40">
        <div
            class="md:w-1/4 frame w-frame-full flex flex-col justify-center sm:h-112 sm:py-32 xs:mt-24"
            :class="{'mobile': $mq === 'sm'}"
        >
            <div class="element-wrapper my-6 mb-6 xs:ml-10">
                <p class="element xs:text-sm sm:text-4xl text-white">
                    09 7258 4400
                </p>
                <p class="element-description xs:text-sm sm:text-base text-pale sf-ui-bold">
                    {{$t('Phone')}}
                    <font-awesome-icon icon="phone"/>
                </p>
            </div>
            <div class="element-wrapper my-6 xs:ml-10">
                <p class="element xs:text-sm sm:text-4xl text-deep-orange">
                    al@al.fi
                </p>
                <p class="element-description xs:text-sm sm:text-base text-pale sf-ui-bold">
                    {{$t('Email address')}}
                    <font-awesome-icon icon="envelope"/>
                </p>
            </div>
            <div class="element-wrapper my-6 xs:ml-10">
                <p class="element xs:text-sm sm:text-4xl text-deep-orange">
                    alfi
                </p>
                <p class="element-description xs:text-sm sm:text-base text-pale sf-ui-bold">
                    {{$t('Skype')}}
                    <font-awesome-icon :icon="['fab', 'skype']"/>
                </p>
            </div>
        </div>
        <div class="md:w-1/4 md:pl-20">
            <form @submit.prevent="submitContactForm">
                <h2 class="mt-0 text-3xl text-pale">{{$t('Review form')}}</h2>
                <div class="form-group-row">
                    <div class="form-unit xs:w-full sm:w-full">
                        <label>
                            <input
                                type="text" name="name" id="name" :placeholder="$t('Name')" v-model="name"
                                class="input-type-text no-input-focus-effect xs:w-full sm:mb-3 sm:w-full required"
                                autocomplete="name" required
                            >
                        </label>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-unit xs:w-full sm:w-full">
                        <label>
                            <input
                                type="text" name="phone" id="phone" :placeholder="$t('Phone')" v-model="phone"
                                class="input-type-text no-input-focus-effect xs:w-full sm:mb-3 sm:w-full required"
                                autocomplete="phone" required
                            >
                        </label>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-unit xs:w-full sm:w-full">
                        <label>
                            <input
                                type="email" name="email" id="email" :placeholder="$t('Email')" v-model="email"
                                class="input-type-text no-input-focus-effect xs:w-full sm:mb-3 sm:w-full required"
                                autocomplete="email" required
                            >
                        </label>
                    </div>
                </div>
                <div class="form-big-unit">
                    <label>
                        <textarea
                            v-model="message"
                            type="text" name="message" id="message"
                            :placeholder="$t('Message')"
                            class="input-type-text no-input-focus-effect xs:w-full sm:mb-3 sm:w-full required"
                            autocomplete="message" required
                        >
                        </textarea>
                    </label>
                </div>
                <button class="btn-orange-default btn-flat mt-0">{{$t('Send')}} ></button>
            </form>
        </div>
    </div>
</template>

<script>
    import ApiService from "@/services/api/apiService";

    export default {
        name: "ContactContent",
        data() {
            return {
                name: null,
                phone: null,
                email: null,
                message: null,
            }
        },
        methods: {
            async submitContactForm()
            {
                try {
                    await ApiService.post('mail', {
                        name: this.name,
                        phone: this.phone,
                        email: this.email,
                        message: this.message
                    });

                    this.$modal.show('dialog', {
                        title: '<span style="color: green">' + this.$t('Success') + '</span>',
                        text: this.$t('Your message is successfully sent.'),
                        buttons: [
                            {
                                title: 'OK'
                            }
                        ]
                    });

                    this.name = null;
                    this.phone = null;
                    this.email = null;
                    this.message = null;
                } catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>
