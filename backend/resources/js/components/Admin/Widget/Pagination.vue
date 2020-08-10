<template>
    <div v-if="paginationMetadata && paginationMetadata.total > 0"
        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        <span class="text-xs xs:text-sm text-gray-900">
                            Showing {{paginationMetadata.from}} to {{paginationMetadata.to}} of {{paginationMetadata.total}} Entries
                        </span>
        <div v-if="paginationMetadata.last_page !== 1" class="inline-flex mt-2 xs:mt-0">
            <button
                v-if="currentPage !== 1"
                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l"
                @click="prevPage"
            >
                {{$t('Prev')}}
            </button>
            <button
                v-if="currentPage !== paginationMetadata.last_page"
                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r"
                @click="nextPage"
            >
                {{$t('Next')}}
            </button>
        </div>
    </div>
</template>

<script>
    import pagination from "@/services/mixin/pagination";

    export default {
        name: "Pagination",
        mixins: [pagination],
        methods: {
            prevPage() {
                this.preparePagination(this.paginationMetadata.current_page - 1);
                this.$emit('paginate', this.paginationMetadata.current_page - 1);
            },

            nextPage() {
                this.preparePagination(this.paginationMetadata.current_page + 1);
                this.$emit('paginate', this.paginationMetadata.current_page + 1);
            }
        }
    }
</script>

<style scoped>

</style>
