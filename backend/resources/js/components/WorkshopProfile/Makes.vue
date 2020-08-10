<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Makes and models are provided') }}</h3>
            <div class="flex flex-row">
                <h6 class="unit-header w-1/4 text-muddy-gray">Car make</h6>
                <h6 class="unit-header w-1/4 text-muddy-gray">Year from</h6>
                <h6 class="unit-header w-1/4 text-muddy-gray">Year to</h6>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1" v-for="(make, key) in updatableMakes">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="make.active"/>
                        {{ make.name }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="make.from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="make.to"/>
            </div>
            <button class="btn-orange-default" @click.prevent="updateMakes">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import ErrorWidget from "@/components/Widget/ErrorWidget";
    import Preloader from "@/components/Widget/Preloader";

    export default {
        name: "Makes",
        components: {Preloader, ErrorWidget, SuccessWidget},
        data() {
            return {
                updatableMakes: {}
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            async updateMakes() {
                await this.errorAwareStoreDispatch(
                    Actions.MAKES_WORKSHOP_UPDATE,
                    this.updatableMakes,
                    this.$t('Your car makes data has been successfully updated.')
                );
            }
        },
        watch: {
            makes() {
                this.updatableMakes = JSON.parse(JSON.stringify(this.makes));
            }
        },
        computed: {
            ...mapState({
                makes: state => state.workshopProfile.makes
            }),
        },
        async created() {
            await this.errorAwareStoreDispatch(Actions.MAKES_WORKSHOP_FETCH);
        }
    }
</script>

<style scoped>

</style>
