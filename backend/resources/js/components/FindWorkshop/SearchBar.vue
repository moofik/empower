<template>
    <div class="search-bar-container">
        <form id="search-bar-form" class="flex flex-row justify-center flex-no-wrap">
            <label class="flex-1">
                <input v-model="input" type="text" :placeholder="$t('Find a workshop by name')"/>
            </label>
            <label class="flex-1">
                <select v-model="brand">
                    <option selected>{{$t('Brand')}}</option>
                    <option :value="make.id" v-for="make in makes">{{make.name}}</option>
                </select>
            </label>
            <label class="flex-1">
                <select v-model="location">
                    <option selected>{{$t('Location')}}</option>
                    <option :value="city" v-for="city in cities">{{city}}</option>
                </select>
            </label>
            <div class="search-bar-button-container flex-1">
                <button type="button" class="btn-orange-default" @click="find">
                    {{$t('Find')}} <font-awesome-icon icon="angle-right"/>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapState} from "vuex";
    import search from "@/services/mixin/search";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
    import Actions from "@/store/actions";
    import routeNames from "@/router/routeNames";
    import Mutations from "@/store/mutations";

    export default {
        name: "SearchBar",
        mixins: [errorAwareWithPreloading, search],
        data() {
            return {
                location: 'Location',
                brand: 'Brand',
                input: ''
            }
        },
        methods: {
            async find() {
                let queryObject = Object.assign({}, this.queryObject);
                queryObject['page'] = 1;
                console.log('push: search bar');
                let route = (this.searchRoute !== null) ? this.searchRoute : this.$route.name;
                try {
                    await this.$router.push({
                        name: route,
                        query: queryObject
                    });
                } catch (e) {
                    console.log(e);
                }

                this.$emit('search', this.queryString);
            }
        },
        computed: {
            ...mapState({
                cities: state => state.filter.cities,
                makes: state => state.filter.makes
            }),
            queryString() {
                let query = `?page=${this.currentPage}&perPage=${this.perPage}`;

                if (this.input !== '') {
                    query += `&workshopSettings.workshop_name[LIKE]=${this.input}`;
                }

                if (this.location !== 'Location') {
                    query += `&workshopSettings.city=${this.location}`;
                }

                if (this.brand !== 'Brand') {
                    query += `&workshopMakes.id=${this.brand}`;
                }

                return query;
            },
            queryObject() {
                let result = {
                    page: parseInt(this.currentPage),
                    perPage: parseInt(this.perPage)
                };

                if (this.input !== '') {
                    result['workshopSettings.workshop_name[LIKE]'] = this.input;
                }

                if (this.location !== 'Location') {
                    result['workshopSettings.city'] = this.location;
                }

                if (this.brand !== 'Brand') {
                    result['workshopMakes.id'] = this.brand;
                }

                return result;
            }
        },
        async created() {
            this.queryAutochangeBlock = true;
            this.searchRoute = routeNames.ROUTE_FIND_WORKSHOP;
            await this.errorAwareStoreDispatch(Actions.FILTER_FETCH_CITIES);
            await this.errorAwareStoreDispatch(Actions.FILTER_FETCH_MAKES);

            this.$store.commit(Mutations.ENABLE_SEARCH_WIDGET);
            const city = (new URLSearchParams(window.location.search)).get('workshopSettings.city');
            const make = (new URLSearchParams(window.location.search)).get('workshopMakes.id');
            const input = (new URLSearchParams(window.location.search)).get('workshopSettings.workshop_name');

            if (city) {
                this.location = city;
            }

            if (make) {
                this.brand = make;
            }

            if (input) {
                this.input = input;
            }
        }
    }
</script>

<style scoped lang="scss">
    .search-bar-container {
        font-family: "SF UI Font Regular", sans-serif;
        background: #fff;
        padding: 30px 0;
        box-shadow: 0 0 15px rgba(0, 0, 0, .18);
    }

    .search-bar-button-container {
        .btn-orange-default {
            height: 46px !important;
            color: #153e5c !important;
            border-radius: 4px !important;
            margin-top: 0 !important;
            box-shadow: none !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
    }

    #search-bar-form {
        max-width: 1200px;
        margin: 0 auto;

        input, select {
            height: 46px;
            width: calc(100% - 20px);
            border-radius: 4px;
            border: 1px solid #f2be54;
            color: #777;
            font-size: 14px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        input {
            padding-left: 48px;
            background: #fff url('/images/lypa.png') 10px center no-repeat;
        }

        select {
            background: #fff url('/images/pd.png') 96% center no-repeat;
            padding-left: 15px;
        }
    }
</style>
