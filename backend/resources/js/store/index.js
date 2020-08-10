import Vue from 'vue'
import Vuex from 'vuex'
import auth from '@/store/auth';
import workshop from '@/store/workshop';
import feedback from '@/store/feedback';
import blog from '@/store/blog';
import workshopProfile from "@/store/workshopProfile";
import error from "@/store/error";
import repairRequest from "@/store/repairRequest";
import pagination from "@/store/pagination";
import filter from "@/store/filter";
import adminPanel from "@/store/admin/admin-panel"
import adminUsers from "@/store/admin/admin-users";
import search from "@/store/search";
import adminCustomer from "@/store/admin/customer";
import adminRepairRequest from "@/store/admin/repairRequest";
import adminShop from "@/store/admin/shop";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth,
        workshop,
        feedback,
        blog,
        workshopProfile,
        error,
        repairRequest,
        pagination,
        filter,
        adminPanel,
        adminUsers,
        adminCustomer,
        adminRepairRequest,
        adminShop,
        search
    },
    strict: true
})
