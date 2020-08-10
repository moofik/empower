<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Spare Parts') }}</h3>
            <div class="form-big-unit" v-for="(option, key) in updatableSpareParts">
                <input type="checkbox" :id="key" v-model="option.active" />
                <label :for="key">{{ option.name }}</label>
            </div>
            <button class="btn-orange-default" @click.prevent="updateSpareParts">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import Actions from "@/store/actions";
    import Preloader from "@/components/Widget/Preloader";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        name: "SpareParts",
        components: {SuccessWidget, ErrorWidget, Preloader},
        data() {
            return {
                updatableSpareParts: {}
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            async updateSpareParts() {
                await this.errorAwareStoreDispatch(
                    Actions.SPARE_PARTS_WORKSHOP_UPDATE,
                    this.updatableSpareParts,
                    this.$t('Your spare parts data has been successfully updated.')
                );
            }
        },
        watch: {
            spareParts() {
                this.updatableSpareParts = JSON.parse(JSON.stringify(this.spareParts));
            }
        },
        computed: {
            ...mapState({
                spareParts: state => state.workshopProfile.spareParts
            }),
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.SPARE_PARTS_WORKSHOP_FETCH);
        }
    }
</script>

<style scoped>

</style>
