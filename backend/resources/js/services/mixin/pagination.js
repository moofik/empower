import {mapState} from 'vuex';

export default {
    computed: {
        ...mapState({
            paginationMetadata: state => state.pagination.metadata
        }),
        currentPage: {
            get() {
                let page = this.$route.query.page;

                if (!page) {
                    page = 1;
                }

                return parseInt(page);
            },

            set() {
            }
        }
    },
    methods: {
        preparePagination(page = 1, queryParams = {}) {
            this.$router.push({
                name: this.$route.name,
                query: Object.assign(queryParams, {page})
            }).catch(() => {
            });

            if (this.loading !== undefined) {
                this.loading = true;
            }

            window.scrollTo(0, 0);
        }
    }
};
