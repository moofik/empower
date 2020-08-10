<template>
    <div>
        <div class="flex flex-row find-workshop-container">
            <div class="flex flex-row find-workshop-container-inner">
                <div class="flex workshop-list">
                    <DetailedWorkshop :workshop-id="parseInt($route.params.id)" />
                </div>
                <div class="flex flex-col flex-1">
                    <WorkshopReviewsWidget :workshop-id="parseInt($route.params.id)" />
                    <br /><br />
                    <BlogWidget :limit="1"/>
                    <AdminMenuWidget v-if="isAdmin || isModerator" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchBar from '@/components/FindWorkshop/SearchBar';
    import BlogWidget from '@/components/Widget/BlogWidget';
    import WorkshopReviewsWidget from "@/components/Shop/WorkshopReviewsWidget";
    import DetailedWorkshop from "@/components/Shop/DetailedWorkshop";
    import AdminMenuWidget from "@/components/Shop/Admin/AdminMenuWidget";
    import roles from "@/services/mixin/roles";

    export default {
        name: "Workshop",
        mixins: [roles],
        components: {DetailedWorkshop, BlogWidget, SearchBar, WorkshopReviewsWidget, AdminMenuWidget}
    }
</script>

<style scoped>

</style>
