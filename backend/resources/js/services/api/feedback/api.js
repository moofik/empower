import ApiService from '@/services/api/apiService'

export default {
    fetchFeedback(page, perPage) {
        return ApiService.get(`/feedback?page=${page}&perPage=${perPage}`);
    },

    fetchFeedbackForWorkshop(workshopId, page, perPage) {
        return ApiService.get(`/workshops/${workshopId}/feedback?page=${page}&perPage=${perPage}`);
    },

    sendFeedback(workshopId, text, image) {
        return ApiService.post(`/workshops/${workshopId}/feedback`, {text, image});
    },

    deleteFeedback(id) {
        return ApiService.delete(`/feedback/${id}`);
    }
}
