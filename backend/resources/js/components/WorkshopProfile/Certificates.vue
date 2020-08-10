<template>
    <div class="flex gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <error-widget v-if="hasError" />
        <success-widget v-if="!hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Upload Certificates') }}</h3>
            <div v-if="certificates !== null && certificates.length > 0" class="form-big-unit">
                <h3>{{$t('Current certificates')}}:</h3>
                <div v-for="certificate in certificates">
                    <img id="workshop-logo" alt="Logo" :src="'/'+certificate.url"/>
                </div>
            </div>
            <div class="form-big-unit">
                <label class="block" for="logo">{{$t('Upload new certificates')}}</label>
                <input
                    class="input-type-text bg-white" id="logo" type="file"
                    @change="addFile($event.target.files[0])" accept=".png,.jpg,.gif"
                />
            </div>
            <button class="btn-orange-default" @click.prevent="uploadFiles">{{ $t('Upload') }}</button>
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
        name: "Certificates",
        components: {Preloader, SuccessWidget, ErrorWidget},
        data() {
            return {
                files: [],
                binaries: [],
                loading: true
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            addFile(file) {
                if (typeof file === "undefined") {
                    return;
                }

                this.files.push(file);
            },
            uploadFiles() {
                this.loading = true;
                let reader = new FileReader();
                let vm = this;

                reader.onload = async (e) => {
                    vm.binaries.push(e.target.result);
                    if (vm.binaries.length === vm.files.length) {
                        await vm.errorAwareStoreDispatch(Actions.WORKSHOP_CERTIFICATES_UPLOAD, vm.binaries);
                        vm.files = [];
                        vm.binaries = [];
                    }
                };

                for (const key in vm.files) {
                    if (vm.files[key].constructor.name === "File") {
                        reader.readAsDataURL(vm.files[key]);
                    }
                }
            }
        },
        computed: {
            ...mapState({
                certificates: state => state.workshopProfile.certificates
            })
        },
        async created() {
            try {
                await this.errorAwareStoreDispatch(Actions.WORKSHOP_CERTIFICATES_FETCH);
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
