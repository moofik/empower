import ApiService from '@/services/api/apiService'

export default {
    login(username, password) {
        return ApiService
            .post(`${process.env.MIX_API_URL}/login`, {
                username,
                password
            })
    },

    registerWorkshop(createWorkshopDto) {
        return ApiService
            .post(`${process.env.MIX_API_URL}/register-workshop`, createWorkshopDto)
    },

    registerUser(createUserDto) {
        return ApiService
            .post(`${process.env.MIX_API_URL}/register-user`, createUserDto)
    },

    logout() {
        return ApiService
            .post(`${process.env.MIX_API_URL}/logout`);
    },

    fetchRole() {
        return ApiService
            .get(`${process.env.MIX_API_URL}/role`);
    }
}
