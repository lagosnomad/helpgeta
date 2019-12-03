const state = {
    orders: []
};

const mutations = {
    UPDATE_ORDERS (state, payload){
        state.orders = payload;
    },
};

const actions = {
    getOrders (context) {
        return new Promise((resolve, reject) => {
            axios.get(route('api.orders.index'))
                .then((response) => {
                    context.commit('UPDATE_ORDERS', response.data)
                })
                .catch((error) => {
                    console.log(error);
                });
            resolve();
        });
    }
};

const getters = {
    orders: state => state.orders,
};

const ordersModule = {
    state,
    mutations,
    actions,
    getters
}

export default ordersModule;