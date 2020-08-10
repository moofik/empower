<template>
    <div class="flex gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Upload Logo') }}</h3>
            <div v-if="logoLink" class="form-big-unit">
                <h3>Current logo:</h3>
                <img id="workshop-logo" alt="Logo" :src="'/'+logoLink" />
            </div>
            <div class="form-big-unit">
                <label class="block" for="logo">{{$t('Upload your workshop logo')}}</label>
                <input class="input-type-text bg-white" id="logo" type="file" @change="addFile($event.target.files[0])" />
            </div>
            <button class="btn-orange-default" @click.prevent="uploadFile">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import Actions from "@/store/actions";
    import {mapState} from "vuex";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "LogoChange",
        components: {Preloader, SuccessWidget, ErrorWidget},
        data() {
            return {
                file: null,
                image: '',
                loading: true
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            addFile(file) {
                if (typeof file === "undefined") {
                    return;
                }

                this.file = file;
            },
            uploadFile() {
                this.loading = true;
                let reader = new FileReader();
                let vm = this;

                reader.onload = async (e) => {
                    vm.image = e.target.result;
                    await vm.errorAwareStoreDispatch(Actions.WORKSHOP_LOGO_UPLOAD, e.target.result);
                    vm.file = null;
                    vm.image = '';
                };

                reader.readAsDataURL(this.file);
            }
        },
        computed: {
            ...mapState({
                logoLink: state => state.workshopProfile.logoLink
            })
        },
        async created() {
            try {
                await this.errorAwareStoreDispatch(Actions.WORKSHOP_LOGO_FETCH);
            } catch (e) {
            }
        }
    }
</script>

<style scoped>
    #workshop-logo {
        max-width: 200px;
    }
</style>
