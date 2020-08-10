import ApiService from '@/services/api/apiService'

export default {
    fetchAdministrators(query = '') {
        let resource = `/admin/administrators`;

        if (query !== '') {
            resource += query;
        }

        return ApiService.get(resource);
    },

    createAdministrator(createAdminDto) {
        return ApiService.post(`/admin/administrators`, createAdminDto);
    },

    fetchAdministrator(id) {
        return ApiService.get(`/admin/administrators/${id}`);
    },

    deleteAdministrator(id) {
        return ApiService.delete(`/admin/administrators/${id}`);
    },

    updateAdministrator(updateAdminDto, id) {
        return ApiService.patch(`/admin/administrators/${id}`, updateAdminDto);
    }
}
