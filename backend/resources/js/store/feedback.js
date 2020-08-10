import Actions from './actions';
import Mutations from './mutations';
import FeedbackApi from '@/services/api/feedback/api';

export default {
    state: {
        reviews: []
    },

    mutations: {
        [Mutations.REVIEWS_SAVE](state, reviews) {
            state.reviews = reviews;
        }
    },

    actions: {
        async [Actions.REVIEWS_FETCH]({commit}, {page = 1, perPage = 3}) {
            const reviews = await FeedbackApi.fetchFeedback(page, perPage);

            commit(Mutations.REVIEWS_SAVE, reviews.data.data);
            return Promise.resolve(reviews)
        },

        async [Actions.REVIEWS_FETCH_FOR_WORKSHOP]({commit}, {id, page = 1, perPage = 3}) {
            const reviews = await FeedbackApi.fetchFeedbackForWorkshop(id, page, perPage);

            commit(Mutations.REVIEWS_SAVE, reviews.data.data);
            return Promise.resolve(reviews)
        },

        async [Actions.REVIEWS_SEND]({commit}, {id, text, image}) {
            const review = await FeedbackApi.sendFeedback(id, text, image);

            return Promise.resolve(review);
        },

        async [Actions.REVIEWS_DELETE](context, id) {
            await FeedbackApi.deleteFeedback(id);

            return Promise.resolve();
        }
    }
};
