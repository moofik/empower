export const setToken = (token) => {
    window.localStorage.setItem('token', token);
};

export const setRefreshToken = (token) => {
    window.localStorage.setItem('refresh_token', token);
};

export const unsetToken = () => {
    window.localStorage.removeItem('token');
    window.localStorage.setItem('logout', Date.now())
};

export const unsetRefreshToken = () => {
    window.localStorage.removeItem('refresh_token');
};

export const getTokenFromLocalStorage = () => {
    return window.localStorage.token;
};
