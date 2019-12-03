const state = {
    selectedStateId: 0,
    cities: [],
    states: []
};

const mutations = {
    UPDATE_STATE_ID (state, payload){
        state.selectedStateId = payload;
    },
    UPDATE_CITIES (state, payload){
        state.cities = payload;
    },
    UPDATE_STATES (state, payload){
        state.states = payload;
    }
};

const actions = {
    getCities (context,stateId) {
        if(stateId){
            context.commit('TOGGLE_IS_LOADING', true);
            axios.get(route('api.cities.index',stateId))
                .then((response) => {
                    context.commit('TOGGLE_IS_LOADING', false);
                    context.commit('UPDATE_CITIES', response.data)
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
};

const getters = {
    selectedStateId: state => state.selectedStateId,
    cities: state => state.cities,
    states: state => state.states,
};

const locationModule = {
    state,
    mutations,
    actions,
    getters
}

export default locationModule;