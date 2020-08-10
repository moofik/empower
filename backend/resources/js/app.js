import Vue from 'vue';
import App from '@/App.vue';
import VueTypedJs from 'vue-typed-js';
import VueI18n from 'vue-i18n';
import VueAwesomeSwiper from "vue-awesome-swiper/src";
import VueMq from 'vue-mq';
import {library} from '@fortawesome/fontawesome-svg-core'
import {
    faAngleDown,
    faAngleRight,
    faArrowCircleLeft,
    faCalendarAlt,
    faCheckCircle,
    faComment,
    faComments,
    faEnvelope,
    faPhone,
    faStore,
    faTasks,
    faTimesCircle,
    faUser,
    faUserCircle,
    faUsers,
    faUserSecret,
    faWrench
} from '@fortawesome/free-solid-svg-icons'
import {faFacebookF, faLinkedinIn, faSkype, faTwitter, faYoutube} from "@fortawesome/free-brands-svg-icons";
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import 'swiper/dist/css/swiper.css'
/** Store and routes instances; Client-side middleware also **/
import AuthMiddleware from '@/middleware/auth';
import store from '@/store';
import router from '@/router';
/** Pagination **/
import Paginate from 'vuejs-paginate';
/** Modals **/
import VModal from 'vue-js-modal';
/** Translations **/
import en from '@/translation/en';
import fi from '@/translation/fi';

Vue.component('paginate', Paginate);

Vue.use(VModal, {dialog: true});

// Use temp storage instead of local storage for storing mocks
// Temp storage has its side effects - if you reload page you lost all info
// By the other hand local storage has its side effects too - you need to clean all data up from local storage
// If you do not do this - mocks will be stored there until you manually remove them
// activateTempStorage();

Vue.use(VueI18n);
Vue.use(VueTypedJs);
Vue.use(VueAwesomeSwiper);
Vue.use(VueMq, {
    breakpoints: {
        sm: 639,
        md: 767,
        lg: 1023,
        xl: Infinity
    },
    defaultBreakpoint: 'sm'
});

/** Font Awesome Config */
library.add(faCalendarAlt);
library.add(faComment);
library.add(faComments);
library.add(faCheckCircle);
library.add(faUserCircle);
library.add(faAngleRight);
library.add(faTimesCircle);
library.add(faPhone);
library.add(faEnvelope);
library.add(faSkype);
library.add(faLinkedinIn);
library.add(faFacebookF);
library.add(faTwitter);
library.add(faYoutube);
library.add(faAngleDown);
library.add(faUserSecret);
library.add(faTasks);
library.add(faWrench);
library.add(faStore);
library.add(faUsers);
library.add(faUser);
library.add(faArrowCircleLeft);
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.config.productionTip = false;

/** Localization config */
const i18n = new VueI18n({
    locale: 'fi',
    fallbackLocale: 'en',
    messages: {...en, ...fi}
});

/** Client middleware executing */
AuthMiddleware.handle();

const app = new Vue({
    el: '#app',
    i18n,
    store,
    router,
    render: h => h(App),
});
