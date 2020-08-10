<template>
    <div class="flex flex-col gradient-gray w-3/5 pt-12 pb-12 pl-12">
        <success-widget v-if="!hasError" />
        <error-widget v-if="hasError" />
        <preloader v-if="loading" />
        <form v-else class="w-9/12">
            <h3 class="page-header">{{ $t('Schedule') }}</h3>
            <div class="flex flex-row">
                <h6 class="unit-header w-1/4 text-muddy-gray">Day</h6>
                <h6 class="unit-header w-1/4 text-muddy-gray">From</h6>
                <h6 class="unit-header w-1/4 text-muddy-gray">To</h6>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="updatableSchedule.monday_active"/>
                        {{ $t('Monday') }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="updatableSchedule.monday_from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="updatableSchedule.monday_to"/>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="updatableSchedule.tuesday_active"/>
                        {{ $t('Tuesday') }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="updatableSchedule.tuesday_from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="updatableSchedule.tuesday_to"/>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="updatableSchedule.wednesday_active"/>
                        {{ $t('Wednesday') }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="updatableSchedule.wednesday_from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="updatableSchedule.wednesday_to"/>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="updatableSchedule.thursday_active"/>
                        {{ $t('Thursday') }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="updatableSchedule.thursday_from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="updatableSchedule.thursday_to"/>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="updatableSchedule.friday_active"/>
                        {{ $t('Friday') }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="updatableSchedule.friday_from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="updatableSchedule.friday_to"/>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="updatableSchedule.saturday_active"/>
                        {{ $t('Saturday') }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="updatableSchedule.saturday_from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="updatableSchedule.saturday_to"/>
            </div>
            <div class="form-big-unit xs:flex xs:flex-row lg:flex lg:flex-row xs:items-center lg:items-center
             border border-light-gray border-l-0 border-r-0 border-b-0 pt-3 pb-1">
                <div class="flex w-1/4">
                    <label>
                        <input type="checkbox" v-model="updatableSchedule.sunday_active"/>
                        {{ $t('Sunday') }}
                    </label>
                </div>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4 mr-4" v-model="updatableSchedule.sunday_from"/>
                <input type="text" class="input-type-text xs:w-1/4 lg:w-1/4" v-model="updatableSchedule.sunday_to"/>
            </div>
            <button class="btn-orange-default" @click.prevent="updateSchedule">{{ $t('Save') }}</button>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Preloader from "@/components/Widget/Preloader";
    import SuccessWidget from "@/components/Widget/SuccessWidget";
    import ErrorWidget from "@/components/Widget/ErrorWidget";

    export default {
        name: "Schedule",
        components: {ErrorWidget, SuccessWidget, Preloader},
        data() {
            return {
                updatableSchedule: {}
            }
        },
        mixins: [errorAwareWithPreloading],
        methods: {
            async updateSchedule() {
                await this.errorAwareStoreDispatch(
                    Actions.SCHEDULE_WORKSHOP_UPDATE,
                    this.updatableSchedule,
                    this.$t('Your schedule has been successfully updated.')
                );
            }
        },
        watch: {
            schedule() {
                this.updatableSchedule = JSON.parse(JSON.stringify(this.schedule));
            }
        },
        computed: {
            ...mapState({
                schedule: state => state.workshopProfile.schedule
            }),
        },
        created() {
            this.$store.dispatch(Actions.SCHEDULE_WORKSHOP_FETCH);
        }
    }
</script>

<style scoped>
    .page-header {
        font-family: "SF UI Text Bold", sans-serif;
        font-size: 21px;
    }

    .unit-header {
        font-family: "SF UI Font Regular", sans-serif;
        font-size: 14px;
    }
</style>
