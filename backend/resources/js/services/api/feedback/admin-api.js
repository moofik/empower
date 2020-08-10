import ApiService from '@/services/api/apiService'

export default {
    fetchFeedback(page, perPage) {
        return ApiService.get(`/admin/feedback?page=${page}&perPage=${perPage}`);
    },

    fetchFeedbackForWorkshop(workshopId, page, perPage) {
        return ApiService.get(`/admin/workshops/${workshopId}/feedback?page=${page}&perPage=${perPage}`);
    },

    fetchFeedbackForCustomer(userId, page, perPage) {
        return ApiService.get(`/admin/customer/${userId}/feedback?page=${page}&perPage=${perPage}`);
    },

    deleteFeedback(workshopId, feedbackId) {
        return ApiService.delete(`/admin/feedbacks/${feedbackId}`);
    }
}
