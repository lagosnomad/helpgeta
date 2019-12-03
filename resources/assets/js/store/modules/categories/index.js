const state = {
    selectedCategoryId: 0,
    selectedCategoryWithNestedItems: {},
    isLoading: false,
    selectedSubCategoriesItems: [],
    savedSubCategoriesItemsWithAmounts: {},
    searchBaseCategory: {},
    searchBaseCategoryFlattenedItems: [],
    searchCategory: {},
    searchCategoryArtisans: [],
    searchFilters: [],
    sortFilters: [
        {name:'Best Rated', value: 'rating' },
        {name:'Newest', value: 'date' },
        {name:'Price: low to high', value: 'price_asc' },
        {name:'Price: high to low', value: 'price_desc' },
    ],
    selectedSearchCategoryItems: [],
};

const mutations = {
    UPDATE_CATEGORY_ID (state, payload){
        state.selectedCategoryId = payload;
    },
    UPDATE_NESTED_CATEGORY_ITEMS(state, payload){
        state.selectedCategoryWithNestedItems = payload;
    },
    TOGGLE_IS_LOADING(state,payload){
        state.isLoading = payload;
    },
    UPDATE_SELECTED_SUB_CATEGORIES_ITEMS(state,payload){
        state.selectedSubCategoriesItems.push(payload)
    },
    RESET_SELECTED_SUB_CATEGORIES_ITEMS(state){
        state.selectedSubCategoriesItems = [];
    },
    REMOVE_SELECTED_CATEGORY_ITEM(state,payload){
        var index = state.selectedSubCategoriesItems.indexOf(payload);
        if (index > -1) {
            state.selectedSubCategoriesItems.splice(index, 1);
        }
    },
    SAVED_SELECTED_SUB_CATEGORIES_ITEMS(state,payload){
        state.selectedSubCategoriesItems = payload;
    },
    SAVED_SUB_CATEGORIES_ITEMS_WITH_AMOUNTS(state,payload){
        state.savedSubCategoriesItemsWithAmounts = payload;
    },
    UPDATE_SUB_CATEGORIES_ITEMS_WITH_AMOUNTS(state,payload){
        state.savedSubCategoriesItemsWithAmounts.push(payload);
    },
    UPDATE_SEARCH_BASE_CATEGORY (state, payload){
        state.searchBaseCategory = payload;
    },
    UPDATE_SEARCH_BASE_CATEGORY_FLATTENED_ITEMS (state, payload){
        state.searchBaseCategoryFlattenedItems = payload;
    },
    UPDATE_SEARCH_CATEGORY (state, payload){
        state.searchCategory = payload;
    },
    UPDATE_SEARCH_CATEGORY_ARTISANS (state, payload){
        state.searchCategoryArtisans = payload;
    },
    UPDATE_SEARCH_FILTERS (state, payload){
        state.searchFilters = payload;
    },
    UPDATE_SELECTED_SEARCH_CATEGORIES_ITEMS(state,payload){
        state.selectedSearchCategoryItems = payload
    },
    ADD_SEARCH_FILTER (state, payload){
        /*let obj_exists = state.searchFilters.find(item => item.name === payload.name);*/
        if(payload.name === 'state'){
            _.remove(state.searchFilters, item => item.name === 'city');
        }
        _.remove(state.searchFilters, item => item.name === payload.name);

        state.searchFilters.push(payload);
    },
    REMOVE_SEARCH_FILTER(state,payload){
        let index = state.searchFilters.indexOf(payload);
        if (index > -1) {
            state.searchFilters.splice(index, 1);
        }
    },
    REMOVE_SEARCH_FILTER_BY_KEY(state,payload){
        let itemByKey = state.searchFilters.find(item => item.name === payload);
        let index = state.searchFilters.indexOf(itemByKey);
        if (index > -1) {
            state.searchFilters.splice(index, 1);
        }
    }
};

const actions = {
    getCategoryNestedItems (context,categoryId) {
        if(categoryId){
            context.commit('TOGGLE_IS_LOADING', true);
            axios.get(route('api.categories.nested',categoryId))
                .then((response) => {
                    context.commit('TOGGLE_IS_LOADING', false);
                    context.commit('UPDATE_NESTED_CATEGORY_ITEMS', response.data)
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },
    getSearchCategoryArtisans ({state,commit}) {
        if(!_.isEmpty(state.searchCategory)){
            let queryString = {};
            state.searchFilters.forEach(obj => {
                queryString[obj.name] = obj.value;
            });
            queryString.category_uri = state.searchCategory.uri;
            return new Promise((resolve, reject) => {
                axios.get('/api/artisans/'+state.searchCategory.id,{
                    params: queryString
                })
                    .then((response) => {
                        commit('UPDATE_SEARCH_CATEGORY_ARTISANS',response.data);
                        resolve();
                    })
                    .catch((error) => {
                        console.log(error);
                        reject();
                    });
            })
        }
    },
    addSelectedSubCategoryItem(context,selectedItem){
        context.commit('UPDATE_SELECTED_SUB_CATEGORIES_ITEMS',selectedItem)
    }
};

const getters = {
    selectedCategoryId: state => state.selectedCategoryId,
    isLoading: state => state.isLoading,
    selectedCategoryWithNestedItems: state => state.selectedCategoryWithNestedItems,
    selectedSubCategoriesItems: state => state.selectedSubCategoriesItems,
    savedSubCategoriesItemsWithAmounts: state => state.savedSubCategoriesItemsWithAmounts,
    searchBaseCategory: state => state.searchBaseCategory,
    searchCategory: state => state.searchCategory,
    searchFilters: state => state.searchFilters,
    searchBaseCategoryFlattenedItems: state => state.searchBaseCategoryFlattenedItems,
    searchCategoryArtisans: state => state.searchCategoryArtisans,
    selectedSearchCategoryItems: state => state.selectedSearchCategoryItems,
    sortFilters: state => state.sortFilters,
};

const CategoriesModule = {
    state,
    mutations,
    actions,
    getters
}

export default CategoriesModule;