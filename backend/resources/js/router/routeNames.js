const routeNames = {
    ROUTE_HOME: 'home',
    ROUTE_USER_REGISTER: 'user-register',
    ROUTE_WORKSHOP_REGISTER: 'workshop-register',
    ROUTE_BLOG: 'blog',
    ROUTE_BLOG_POST: 'blog-post',
    ROUTE_CONTACT_US: 'contact-us',
    ROUTE_FIND_WORKSHOP: 'workshops',
    ROUTE_PROFILE: 'profile',
    ROUTE_USER_PROFILE_BASIC_SETTINGS: 'user-basic-settings',
    ROUTE_WORKSHOP_PROFILE_BASIC_SETTINGS: 'workshop-basic-settings',
    ROUTE_PROFILE_SERVICES: 'services',
    ROUTE_PROFILE_ADDITIONAL_SERVICES: 'additional-services',
    ROUTE_PROFILE_MAKES: 'makes',
    ROUTE_PROFILE_PAYMENT_OPTIONS: 'payment-options',
    ROUTE_PROFILE_SCHEDULE: 'schedule',
    ROUTE_PROFILE_SPARE_PARTS: 'spare-parts',
    ROUTE_PROFILE_WARRANTY: 'warranty',
    ROUTE_PROFILE_LOGO_CHANGE: 'logo-change',
    ROUTE_PROFILE_CERTIFICATES: 'certificates',
    ROUTE_PROFILE_EMAIL_SETUP: 'email-setup',
    ROUTE_PROFILE_CHANGE_PASSWORD: 'change-password',
    ROUTE_USER_REQUESTS: 'my-requests',
    ROUTE_USER_REPAIR_REQUEST: 'my-request',
    ROUTE_OFFERED_REPAIR_REQUEST_LIST: 'my-offers',
    ROUTE_OFFERED_REPAIR_REQUEST: 'my-offer',
    ROUTE_HUB_REPAIR_REQUEST_LIST: 'hub-repair-requests',
    ROUTE_HUB_REPAIR_REQUEST: 'hub-repair-request',
    ROUTE_INCOMING_REPAIR_REQUEST_LIST: 'incoming-repair-requests',
    ROUTE_INCOMING_REPAIR_REQUEST: 'incoming-repair-request',
    ROUTE_REQUEST_REPAIR: 'request-repair',
    ROUTE_WORKSHOP: 'workshop',
    ROUTE_WORKSHOP_REVIEWS: 'workshop-reviews',
    ROUTE_REVIEWS: 'reviews',
    ROUTE_ADMIN: 'admin',
    ROUTE_ADMIN_USERS: 'admin-users',
    ROUTE_ADMIN_USERS_CREATE: 'admin-users-create',
    ROUTE_ADMIN_USERS_EDIT: 'admin-users-edit',
    ROUTE_ADMIN_CUSTOMER_USERS: 'admin-customers',
    ROUTE_ADMIN_CUSTOMER_USERS_CREATE: 'admin-customers-create',
    ROUTE_ADMIN_CUSTOMER_USERS_EDIT: 'admin-customers-edit',
    ROUTE_ADMIN_REPAIR_REQUESTS: 'admin-repair-requests',
    ROUTE_ADMIN_REPAIR_REQUEST_SHOW: 'admin-repair-request-show',
    ROUTE_ADMIN_REPAIR_REQUEST_OFFERS: 'admin-repair-request-offers',
    ROUTE_ADMIN_SHOPS: 'admin-shops',
    ROUTE_ADMIN_SHOP_EDIT: 'admin-shops-edit',
    ROUTE_ADMIN_SHOPS_REVIEWS: 'admin-shops-reviews',
    ROUTE_NOT_FOUND: 'not-found',
};

export const routeTitles = {
    ROUTE_HOME: 'Home',
    ROUTE_USER_REGISTER: 'Register user',
    ROUTE_WORKSHOP_REGISTER: 'Register workshop',
    ROUTE_BLOG: 'Blog',
    ROUTE_CONTACT_US: 'Contact Us',
    ROUTE_FIND_WORKSHOP: 'Find workshop',
    ROUTE_PROFILE: 'Profile',
    ROUTE_USER_PROFILE_BASIC_SETTINGS: 'Basic settings',
    ROUTE_WORKSHOP_PROFILE_BASIC_SETTINGS: 'Basic settings',
    ROUTE_PROFILE_SERVICES: 'Services',
    ROUTE_PROFILE_ADDITIONAL_SERVICES: 'Additional services',
    ROUTE_PROFILE_MAKES: 'Car makes',
    ROUTE_PROFILE_PAYMENT_OPTIONS: 'Payment options',
    ROUTE_PROFILE_SCHEDULE: 'Schedule',
    ROUTE_PROFILE_SPARE_PARTS: 'Spare parts',
    ROUTE_PROFILE_WARRANTY: 'Warranty',
    ROUTE_PROFILE_LOGO_CHANGE: 'Set logo',
    ROUTE_PROFILE_CERTIFICATES: 'Certificates',
    ROUTE_PROFILE_EMAIL_SETUP: 'Change email',
    ROUTE_PROFILE_CHANGE_PASSWORD: 'Change password',
    ROUTE_USER_REQUESTS: 'My repair requests',
    ROUTE_USER_REPAIR_REQUEST: 'Repair request',
    ROUTE_OFFERED_REPAIR_REQUEST_LIST: 'My offers',
    ROUTE_OFFERED_REPAIR_REQUEST: 'Offer',
    ROUTE_HUB_REPAIR_REQUEST_LIST: 'Hub requests',
    ROUTE_HUB_REPAIR_REQUEST: 'Hub request',
    ROUTE_INCOMING_REPAIR_REQUEST_LIST: 'Incoming requests',
    ROUTE_INCOMING_REPAIR_REQUEST: 'Incoming request',
    ROUTE_REQUEST_REPAIR: 'Request repair',
    ROUTE_WORKSHOP: 'Shop',
    ROUTE_WORKSHOP_REVIEWS: 'Reviews',
    ROUTE_REVIEWS: 'Reviews',

    ROUTE_WORKSHOP_REVIEWS_ENTITY: 'Review',
    ROUTE_REPAIR_REQUEST_ENTITY: 'Repair request',
    ROUTE_OFFERED_REPAIR_REQUEST_ENTITY: 'Offer',
    ROUTE_HUB_REPAIR_REQUEST_ENTITY: 'Hub request',
    ROUTE_INCOMING_REPAIR_REQUEST_ENTITY: 'Incoming request',
    ROUTE_WORKSHOP_ENTITY: 'Shop',
    ROUTE_BLOG_ENTITY: 'Post',
};

export const restrictedRoutes = [
    routeNames.ROUTE_PROFILE,
    routeNames.ROUTE_USER_PROFILE_BASIC_SETTINGS,
    routeNames.ROUTE_WORKSHOP_PROFILE_BASIC_SETTINGS,
    routeNames.ROUTE_PROFILE_SERVICES,
    routeNames.ROUTE_PROFILE_ADDITIONAL_SERVICES,
    routeNames.ROUTE_PROFILE_MAKES,
    routeNames.ROUTE_PROFILE_PAYMENT_OPTIONS,
    routeNames.ROUTE_PROFILE_SPARE_PARTS,
    routeNames.ROUTE_PROFILE_WARRANTY,
    routeNames.ROUTE_PROFILE_LOGO_CHANGE,
    routeNames.ROUTE_PROFILE_EMAIL_SETUP,
    routeNames.ROUTE_PROFILE_CHANGE_PASSWORD,
    routeNames.ROUTE_USER_REQUESTS,
    routeNames.ROUTE_OFFERED_REPAIR_REQUEST_LIST,
    routeNames.ROUTE_HUB_REPAIR_REQUEST_LIST,
    routeNames.ROUTE_INCOMING_REPAIR_REQUEST_LIST,
    routeNames.ROUTE_INCOMING_REPAIR_REQUEST,
    routeNames.ROUTE_REQUEST_REPAIR,
];

export function isRestrictedRoute(route) {
    return restrictedRoutes.indexOf(route) !== -1;
}

export default routeNames;
