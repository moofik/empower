import ApiService from '@/services/api/apiService'

export default {
    fetchCustomers(query = '') {
        let resource = `/admin/customers`;

        if (query !== '') {
            resource += query;
        }

        return ApiService.get(resource);
    },

    createCustomer(createCustomerDto) {
        return ApiService.post(`/admin/customers`, createCustomerDto);
    },

    fetchCustomer(id) {
        return ApiService.get(`/admin/customers/${id}`);
    },

    deleteCustomer(id) {
        return ApiService.delete(`/admin/customers/${id}`);
    },

    updateCustomer(updateCustomerDto, id) {
        return ApiService.patch(`/admin/customers/${id}`, updateCustomerDto);
    },

    fetchRepairRequestForCustomer(id) {
        return ApiService.get(`/admin/customer/${id}/requests`);
    }
}
