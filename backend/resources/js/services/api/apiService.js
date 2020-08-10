import axios from 'axios'

const ApiService = {
    init() {
        axios.defaults.baseURL = process.env.MIX_API_URL;
    },

    setBearerToken(token) {
        axios.defaults.headers.common.Authorization = `Bearer ${token}`
    },

    query(resource, params) {
        return axios.get(resource, params)
    },

    get(resource, slug = '') {
        if (slug !== '') {
            resource += ('/' + slug)
        }

        return axios.get(resource)
    },

    getBlob(url) {
        return axios({
            url: url,
            method: 'GET',
            responseType: 'blob'
        })
    },

    post(resource, params) {
        return axios.post(`${resource}`, params)
    },

    update(resource, slug, params) {
        return axios.put(`${resource}/${slug}`, params)
    },

    put(resource, params) {
        return axios.put(`${resource}`, params)
    },

    delete(resource) {
        return axios.delete(resource)
    },

    patch(resource, params) {
        return axios.patch(`${resource}`, params)
    }
};

ApiService.init();

export default ApiService
