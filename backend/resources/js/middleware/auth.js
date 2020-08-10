import store from '@/store';
import Mutations from "@/store/mutations";
import ApiService from "@/services/api/apiService";
import {getTokenFromLocalStorage} from "@/services/security/authManager";

export default {
    handle() {
        const token = getTokenFromLocalStorage();

        if (token) {
            ApiService.setBearerToken(token);
            store.commit(Mutations.AUTH_SET_TOKEN, token);
        }
    }
}
