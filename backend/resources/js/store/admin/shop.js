import Mutations from './mutations';
import Actions from './actions';
import AdminShopsApi from '@/services/api/workshop/admin-api';

export default {
    state: {
        shops: [],
        reviews: [],
        currentShop: null
    },

    mutations: {
        [Mutations.SAVE_SHOPS](state, shops) {
            state.shops = shops;
        },

        [Mutations.SAVE_CURRENT_SHOP](state, shop) {
            state.currentShop = user;
        },

        [Mutations.SAVE_SHOP_REVIEWS](state, reviews) {
            state.reviews = reviews;
        }
    },

    actions: {
        async [Actions.FETCH_SHOPS]({commit}, query = '') {
            const shops = await AdminShopsApi.fetchShops(query);

            commit(Mutations.SAVE_SHOPS, shops.data.data);
            return Promise.resolve(shops);
        },

        async [Actions.FETCH_SHOP]({commit}, id) {
            const shop = await AdminShopsApi.fetchShop(id);

            commit(Mutations.SAVE_CUSTOMER_CURRENT_USER, shop.data.data);
            return Promise.resolve(shop);
        },

        async [Actions.FETCH_SHOP_REVIEWS]({commit}, id) {
            const reviews = await AdminShopsApi.fetchReviewsForShop(id);

            commit(Mutations.SAVE_SHOP_REVIEWS, reviews.data.data);
            return Promise.resolve(reviews);
        },

        async [Actions.UPDATE_SHOP]({commit}, {id, updateShopDto}) {
            const shop = await AdminShopsApi.updateShop(updateShopDto, id);

            return Promise.resolve(shop);
        },

        async [Actions.DELETE_SHOP]({commit}, id) {
            await AdminShopsApi.deleteShop(id);

            return Promise.resolve();
        },
    }
};
