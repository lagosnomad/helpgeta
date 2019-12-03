const state = {
    openMobileNav: false,
};

const mutations = {
    UPDATE_OPEN_MOBILE_NAV (state, payload){
        state.openMobileNav = payload;
    },
};

const getters = {
    openMobileNav: state => state.openMobileNav,
};

const module = {
    state,
    mutations,
    getters
}

export default module;