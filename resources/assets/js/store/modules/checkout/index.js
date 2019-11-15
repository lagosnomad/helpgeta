const state = {
    selectedCategoryItems: [],
    requestDates: [],
    category: null,
    artisan: null
    /*requestStartDate: '',
    requestStartTime: '',
    requestEndDate: '',
    requestEndTime: ''*/
}

const mutations = {
    UPDATE_CATEGORY (state, payload){
        state.category = payload;
    },
    UPDATE_ARTISAN (state, payload){
        state.artisan = payload;
    },
    ADD_CATEGORY_ITEM (state, payload) {
        state.selectedCategoryItems.push(payload);
    },
    REMOVE_CATEGORY_ITEM (state, payload){
        const index = state.selectedCategoryItems.findIndex(f => f === payload);
        if (index >= 0)
            state.selectedCategoryItems.splice(index, 1);
    },
    /*ADD_REQUEST_DATE (state, payload) {
        let name = payload.name;
        state[name] = payload.value;
    }*/
    /*UPDATE_REQUEST_DATES (state, payload) {
        state.requestDates = payload;
    },*/

    UPDATE_REQUEST_DATES (state, payload) {
        let requestDateInputs = payload;
        let filteredArray = requestDateInputs.filter(el => {
            if(state.category.is_hourly_based)
                return el.date && el.hours;
            else
                return el.date;
        });
        state.requestDates = filteredArray;
    }


}

const actions = {
    transformRequestDates (context,payload) {
        let items = payload;
        items.map(obj=>{
            obj.day = new Date(obj.day).toISOString();
        });
        context.commit('ADD_REQUEST_DATE',items)
    }
}

const getters = {
    selectedCategoryItems: state => state.selectedCategoryItems,
    artisan: state => state.artisan,
    category: state => state.category,
    requestDates: state => state.requestDates,
    checkoutTotal: (state,getters) => {
        return state.selectedCategoryItems.reduce((acc, categoryItem) => {
            if(categoryItem.is_hourly_based)
                return (categoryItem.amount * (getters.checkoutTotalHours * getters.checkoutTotalDays)) + acc;
            else
                return (categoryItem.amount * getters.checkoutTotalDays) + acc;
        }, 0).toFixed(2);
    },
    checkoutTotalHours: state => {
        if(state.requestDates.length)
            return state.requestDates.reduce((acc, requestDate) => {
                return Number(requestDate.hours) + acc;
            },0);
        return 0;
    },
    checkoutTotalDays: state => {
        return state.requestDates.length;
    }
}

const checkoutModule = {
    state,
    mutations,
    actions,
    getters
}

export default checkoutModule;