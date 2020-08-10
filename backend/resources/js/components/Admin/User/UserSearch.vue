<template>
    <div class="my-2 flex sm:flex-row flex-col">
        <div class="flex flex-row mb-1 sm:mb-0">
            <div class="relative">
                <select
                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400
                     text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    v-model="perPage"
                >
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                </select>
                <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
            <input :placeholder="$t('Search')"
                   class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6
                    py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600
                     focus:text-gray-700 focus:outline-none"
                   v-model="input"
            />
        </div>
    </div>
</template>

<script>
    import debounce from "@/services/helpers/debounce";
    import search from "@/services/mixin/search";
    import Mutations from '@/store/mutations';

    export default {
        name: "Search",
        mixins: [search],
        data() {
            return {
                input: '',
                debouncedInput: '',
            }
        },
        watch: {
            input: debounce(function (newVal) {
                this.debouncedInput = newVal
            }, 500),
        },
        computed: {
            queryString() {
                let query = `?page=${this.currentPage}&perPage=${this.perPage}`;

                if (this.debouncedInput !== '') {
                    query += `&email,full_name[LIKE]=${this.debouncedInput}`;
                }

                return query;
            },

            queryObject() {
                let result = {
                    page: this.currentPage,
                    perPage: parseInt(this.perPage)
                };

                if (this.debouncedInput !== '') {
                    this.overridenPage = 1;
                    result['email,full_name[LIKE]'] = this.debouncedInput
                }

                return result;
            }
        },
        created() {
            this.$store.commit(Mutations.ENABLE_SEARCH_WIDGET);
            const debouncedInput = (new URLSearchParams(window.location.search)).get('email,full_name[LIKE]');

            if (debouncedInput) {
                this.input = debouncedInput;
                this.debouncedInput = debouncedInput;
            }
        }
    }
</script>

<style scoped>

</style>
