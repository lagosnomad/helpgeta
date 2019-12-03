export default {
    methods: {
        fetchArtisans() {
            let loadingComponent = this.$loading.open({
                container: document.getElementById('artisan-listings')
            });
            this.$store.dispatch('getSearchCategoryArtisans').then(function () {
                loadingComponent.close();
            });
        },
        getFilterId(type,obj=false){
            let value = null;
            let item = this.searchFilters.find(item => item.name === type);

            if(!_.isEmpty(item))
                if(obj) {
                    if (!_.isEmpty(item.obj)) value = item.obj.id;
                }else{
                  value = item.value ;
                }

            return value;
        },
    }
}