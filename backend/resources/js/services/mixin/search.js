import pagination from "@/services/mixin/pagination";

export default {
    mixins: [pagination],
    props: {
        initAutochangeBlock: {
            type: Boolean,
            required: false,
            default: false
        }
    },
    data() {
        return {
            overridenPage: null,
            perPage: 5,
            freshLoad: true,
            searchRoute: null,
            queryAutochangeBlock: false
        }
    },
    computed: {
        queryFromUri() {
            let queryFromUri = Object.assign({}, this.$route.query);

            if (queryFromUri['page']) {
                queryFromUri['page'] = parseInt(queryFromUri['page']);
            }

            if (queryFromUri['perPage']) {
                queryFromUri['perPage'] = parseInt(queryFromUri['perPage']);
            }

            return queryFromUri;
        },

        querySourcesEquality() {
            return JSON.stringify(this.queryFromUri) === JSON.stringify(this.queryObject);
        }
    },

    watch: {
        async queryString(newVal) {
            if (!this.querySourcesEquality && !this.queryAutochangeBlock) {
                try {
                    await this.$router.push({
                        name: this.$route.name,
                        query: this.queryObject
                    });
                } catch (e) {
                    console.log(e);
                }

                console.log('query string watcher, qs: ', newVal);
                this.$emit('search', newVal);
            }
        }
    },

    async mounted() {
        let queryObject = Object.assign({}, this.queryObject);

        if (this.freshLoad && this.overridenPage) {
            queryObject['page'] = this.overridenPage;
            this.freshLoad = false;
        }

        this.$emit('search', this.queryString);
        let route = (this.searchRoute !== null) ? this.searchRoute : this.$route.name;

        if (!this.querySourcesEquality && !this.initAutochangeBlock) {
            try {
                await this.$router.push({
                    name: route,
                    query: queryObject
                });
            } catch (e) {
                console.log('query from uri: ', this.queryFromUri);
                console.log('query from object: ', this.queryObject);
                console.log(this.querySourcesEquality);
            }
        }
    },

    created() {
        if (this.$route.query.perPage) {
            this.perPage = this.$route.query.perPage;
        }
    }
}
