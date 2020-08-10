import Home from '@/pages/Home.vue';
import RegisterWorkshop from '@/pages/RegisterWorkshop.vue';
import Blog from '@/pages/Blog.vue';
import ContactUs from '@/pages/ContactUs.vue';
import FindWorkshop from '@/pages/FindWorkshop.vue';
import Profile from '@/pages/Profile.vue';
import HubRepairRequestList from '@/pages/HubRepairRequestList';
import IncomingRepairRequestList from '@/pages/IncomingRepairRequestList';
import OfferedRepairRequestList from "@/pages/OfferedRepairRequestList";
import Routes, {routeTitles} from '@/router/routeNames';
import Workshop from "@/pages/Shop";
import Post from "@/pages/Post";
import Reviews from "@/pages/Reviews";
import NotFound from "@/pages/NotFound";
import RequestQuote from "@/pages/RequestRepair";
import RegisterUser from "@/pages/RegisterUser";
import ProfileComponents from "@/components/WorkshopProfile/profileComponents";
import UserRepairRequestsList from "@/components/ItemRequest/UserRepairRequestsList";
import RepairRequestDefine from "@/components/ItemRequest/RepairRequestDefine";
import AdminUsers from "@/pages/Admin/AdminUsers";
import AdminUsersCreate from "@/pages/Admin/AdminUsersCreate";
import AdminUsersEdit from "@/pages/Admin/AdminUsersEdit";
import AdminCustomersEdit from "@/pages/Admin/AdminCustomersEdit";
import AdminCustomersCreate from "@/pages/Admin/AdminCustomersCreate";
import AdminCustomers from "@/pages/Admin/AdminCustomers";
import AdminRepairRequests from "@/pages/Admin/AdminRepairRequests";
import AdminRepairRequestsShow from "@/pages/Admin/AdminRepairRequestsShow";
import AdminRepairRequestOffers from "@/pages/Admin/AdminRepairRequestOffers";
import AdminShops from "@/pages/Admin/AdminShops";
import AdminShopsEdit from "@/pages/Admin/AdminShopsEdit";

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: Routes.ROUTE_HOME,
            component: Home,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME}
                ]
            }
        },
        {
            path: '/user-register',
            name: Routes.ROUTE_USER_REGISTER,
            component: RegisterUser,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_USER_REGISTER},
                ]
            }
        },
        {
            path: '/workshop-register',
            name: Routes.ROUTE_WORKSHOP_REGISTER,
            component: RegisterWorkshop,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_WORKSHOP_REGISTER},
                ]
            }
        },
        {
            path: '/blog',
            name: Routes.ROUTE_BLOG,
            component: Blog,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_BLOG},
                ]
            }
        },
        {
            path: '/blog/:id',
            name: Routes.ROUTE_BLOG_POST,
            component: Post,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_BLOG, route: Routes.ROUTE_BLOG},
                    {title: routeTitles.ROUTE_BLOG_ENTITY, params: 'id'},
                ]
            }
        },
        {
            path: '/contact-us',
            name: Routes.ROUTE_CONTACT_US,
            component: ContactUs,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_CONTACT_US},
                ]
            }
        },
        {
            path: '/incoming-repair-requests',
            name: Routes.ROUTE_INCOMING_REPAIR_REQUEST_LIST,
            component: IncomingRepairRequestList,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_INCOMING_REPAIR_REQUEST_LIST},
                ]
            },
        },
        {
            path: '/hub-repair-requests',
            name: Routes.ROUTE_HUB_REPAIR_REQUEST_LIST,
            component: HubRepairRequestList,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_HUB_REPAIR_REQUEST_LIST},
                ]
            },
        },
        {
            path: '/my-offers',
            name: Routes.ROUTE_OFFERED_REPAIR_REQUEST_LIST,
            component: OfferedRepairRequestList,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_OFFERED_REPAIR_REQUEST_LIST},
                ]
            }
        },
        {
            path: '/my-requests',
            name: Routes.ROUTE_USER_REQUESTS,
            component: UserRepairRequestsList,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_USER_REQUESTS},
                ]
            }
        },
        {
            path: '/incoming-repair-requests/:id',
            name: Routes.ROUTE_INCOMING_REPAIR_REQUEST,
            component: RepairRequestDefine,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {
                        title: routeTitles.ROUTE_INCOMING_REPAIR_REQUEST_LIST,
                        route: Routes.ROUTE_INCOMING_REPAIR_REQUEST_LIST
                    },
                    {title: routeTitles.ROUTE_INCOMING_REPAIR_REQUEST_ENTITY, params: 'id'},
                ]
            }
        },
        {
            path: '/hub-repair-requests/:id',
            name: Routes.ROUTE_HUB_REPAIR_REQUEST,
            component: RepairRequestDefine,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_HUB_REPAIR_REQUEST_LIST, route: Routes.ROUTE_HUB_REPAIR_REQUEST_LIST},
                    {title: routeTitles.ROUTE_HUB_REPAIR_REQUEST_ENTITY, params: 'id'},
                ],
            }
        },
        {
            path: '/my-offers/:id',
            name: Routes.ROUTE_OFFERED_REPAIR_REQUEST,
            component: RepairRequestDefine,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_USER_REQUESTS, routes: Routes.ROUTE_USER_REQUESTS},
                    {title: routeTitles.ROUTE_OFFERED_REPAIR_REQUEST_ENTITY, params: 'id'},
                ],
            }
        },
        {
            path: '/my-requests/:id',
            name: Routes.ROUTE_USER_REPAIR_REQUEST,
            component: RepairRequestDefine,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_USER_REPAIR_REQUEST, route: Routes.ROUTE_USER_REPAIR_REQUEST},
                    {title: routeTitles.ROUTE_REPAIR_REQUEST_ENTITY, params: 'id'},
                ],
            }
        },
        {
            path: '/request-repair',
            name: Routes.ROUTE_REQUEST_REPAIR,
            component: RequestQuote,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_USER_REQUESTS},
                ],
            }
        },
        {
            path: '/workshops',
            name: Routes.ROUTE_FIND_WORKSHOP,
            component: FindWorkshop,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_FIND_WORKSHOP},
                ],
            }
        },
        {
            path: '/workshop/:id',
            name: Routes.ROUTE_WORKSHOP,
            component: Workshop,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_FIND_WORKSHOP, route: Routes.ROUTE_FIND_WORKSHOP},
                    {title: routeTitles.ROUTE_WORKSHOP_ENTITY, params: 'id'},
                ],
            }
        },
        {
            path: '/profile',
            name: Routes.ROUTE_PROFILE,
            component: Profile,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_PROFILE},
                ],
            },
            children: [
                {
                    path: Routes.ROUTE_WORKSHOP_PROFILE_BASIC_SETTINGS,
                    name: Routes.ROUTE_WORKSHOP_PROFILE_BASIC_SETTINGS,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_WORKSHOP_PROFILE_BASIC_SETTINGS},
                        ],
                        profileComponent: ProfileComponents.PROFILE_BASIC_SETTINGS
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_SERVICES,
                    name: Routes.ROUTE_PROFILE_SERVICES,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_SERVICES},
                        ],
                        profileComponent: ProfileComponents.PROFILE_SERVICES
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_ADDITIONAL_SERVICES,
                    name: Routes.ROUTE_PROFILE_ADDITIONAL_SERVICES,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_ADDITIONAL_SERVICES},
                        ],
                        profileComponent: ProfileComponents.PROFILE_ADDITIONAL_SERVICES
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_PAYMENT_OPTIONS,
                    name: Routes.ROUTE_PROFILE_PAYMENT_OPTIONS,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_PAYMENT_OPTIONS},
                        ],
                        profileComponent: ProfileComponents.PROFILE_PAYMENT_OPTIONS
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_SPARE_PARTS,
                    name: Routes.ROUTE_PROFILE_SPARE_PARTS,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_SPARE_PARTS},
                        ],
                        profileComponent: ProfileComponents.PROFILE_SPARE_PARTS
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_MAKES,
                    name: Routes.ROUTE_PROFILE_MAKES,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_MAKES},
                        ],
                        profileComponent: ProfileComponents.PROFILE_MAKES
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_SCHEDULE,
                    name: Routes.ROUTE_PROFILE_SCHEDULE,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_SCHEDULE},
                        ],
                        profileComponent: ProfileComponents.PROFILE_SCHEDULE
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_WARRANTY,
                    name: Routes.ROUTE_PROFILE_WARRANTY,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_WARRANTY},
                        ],
                        profileComponent: ProfileComponents.PROFILE_WARRANTY
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_LOGO_CHANGE,
                    name: Routes.ROUTE_PROFILE_LOGO_CHANGE,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_LOGO_CHANGE},
                        ],
                        profileComponent: ProfileComponents.PROFILE_LOGO_CHANGE
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_CERTIFICATES,
                    name: Routes.ROUTE_PROFILE_CERTIFICATES,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_CERTIFICATES},
                        ],
                        profileComponent: ProfileComponents.PROFILE_CERTIFICATES
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_EMAIL_SETUP,
                    name: Routes.ROUTE_PROFILE_EMAIL_SETUP,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_EMAIL_SETUP},
                        ],
                        profileComponent: ProfileComponents.PROFILE_EMAIL_SETUP
                    }
                },
                {
                    path: Routes.ROUTE_PROFILE_CHANGE_PASSWORD,
                    name: Routes.ROUTE_PROFILE_CHANGE_PASSWORD,
                    component: Profile,
                    meta: {
                        breadcrumb: [
                            {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                            {title: routeTitles.ROUTE_PROFILE, route: Routes.ROUTE_PROFILE},
                            {title: routeTitles.ROUTE_PROFILE_CHANGE_PASSWORD},
                        ],
                        profileComponent: ProfileComponents.PROFILE_CHANGE_PASSWORD
                    }
                }
            ]
        },
        {
            path: '/reviews',
            name: Routes.ROUTE_REVIEWS,
            component: Reviews,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_REVIEWS}
                ]
            }
        },
        {
            path: '/workshop/:id/reviews',
            name: Routes.ROUTE_WORKSHOP_REVIEWS,
            component: Reviews,
            meta: {
                breadcrumb: [
                    {title: routeTitles.ROUTE_HOME, route: Routes.ROUTE_HOME},
                    {title: routeTitles.ROUTE_FIND_WORKSHOP, route: Routes.ROUTE_FIND_WORKSHOP},
                    {title: routeTitles.ROUTE_WORKSHOP_ENTITY, route: Routes.ROUTE_WORKSHOP, params: 'id'},
                    {title: routeTitles.ROUTE_REVIEWS},
                ]
            }
        },
        {
            path: '/admin/administrators',
            name: Routes.ROUTE_ADMIN_USERS,
            component: AdminUsers,
        },
        {
            path: '/admin/administrators/create',
            name: Routes.ROUTE_ADMIN_USERS_CREATE,
            component: AdminUsersCreate,
        },
        {
            path: '/admin/administrators/:id',
            name: Routes.ROUTE_ADMIN_USERS_EDIT,
            component: AdminUsersEdit,
        },
        {
            path: '/admin/customers',
            name: Routes.ROUTE_ADMIN_CUSTOMER_USERS,
            component: AdminCustomers,
        },
        {
            path: '/admin/customers/create',
            name: Routes.ROUTE_ADMIN_CUSTOMER_USERS_CREATE,
            component: AdminCustomersCreate,
        },
        {
            path: '/admin/customers/:id',
            name: Routes.ROUTE_ADMIN_CUSTOMER_USERS_EDIT,
            component: AdminCustomersEdit,
        },

        {
            path: '/admin/workshops',
            name: Routes.ROUTE_ADMIN_SHOPS,
            component: AdminShops,
        },
        {
            path: '/admin/workshops/:id',
            name: Routes.ROUTE_ADMIN_SHOP_EDIT,
            component: AdminShopsEdit,
        },

        {
            path: '/admin/requests',
            name: Routes.ROUTE_ADMIN_REPAIR_REQUESTS,
            component: AdminRepairRequests,
        },
        {
            path: '/admin/requests/:id',
            name: Routes.ROUTE_ADMIN_REPAIR_REQUEST_SHOW,
            component: AdminRepairRequestsShow,
        },
        {
            path: '/admin/requests/:id/offers',
            name: Routes.ROUTE_ADMIN_REPAIR_REQUEST_OFFERS,
            component: AdminRepairRequestOffers,
        },
        {
            path: '*',
            name: Routes.ROUTE_NOT_FOUND,
            component: NotFound,
        }
    ]
}
