<template>
    <div class="flex flex-col">
        <SearchBar @search="updateData($event)"/>
        <div class="flex flex-row find-workshop-container">
            <div class="flex flex-row find-workshop-container-inner">
                <div class="flex workshop-list">
                    <WorkshopList :loading="loading" @paginate="updateData"/>
                </div>
                <div class="flex flex-col flex-1">
                    <BlogWidget />
                    <Counters />
                </div>
            </div>
        </div>
        <reviews-widget />
    </div>
</template>

<script>
    import SearchBar from '@/components/FindWorkshop/SearchBar';
    import WorkshopList from '@/components/FindWorkshop/WorkshopList';
    import BlogWidget from '@/components/Widget/BlogWidget';
    import Counters from '@/components/FindWorkshop/Counters';
    import ReviewsWidget from '@/components/Reviews/ReviewsWidget';
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        name: "FindWorkshop",
        mixins: [errorAwareWithPreloading],
        components: {Counters, BlogWidget, WorkshopList, SearchBar, ReviewsWidget},
        methods: {
            async updateData(query = '') {
                if (query === '') {
                    return ;
                }

                await this.errorAwareStoreDispatch(Actions.WORKSHOP_FETCH_ALL, query);
            }
        }
    }
</script>

<style lang="scss">
    .workshop-list {
        flex: 2 1 0;
    }

    .find-workshop-container {
        background: #cdd4ca;
        padding: 50px 0;
    }

    .find-workshop-container-inner {
        width: 70%;
        max-width: 1200px;
        margin: 0 auto;
    }
</style>
