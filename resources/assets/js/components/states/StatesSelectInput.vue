<template>
		<b-select v-model="selectedStateId" name="state_id" expanded :loading="isLoading" @input="onChange" required>
			<option
					:value="null"
					selected
					disabled
					hidden>
				Select a State
			</option>
			<option
					v-for="state in states"
					:value="state.id"
					:key="state.id">
				{{ state.name }}
			</option>
		</b-select>
</template>

<script type="text/babel">
    export default {
        name: 'StatesSelectInput',
	    props:{
            selected:{
                type: Number,
	            default: null
            },
            isFilter:{
                type: Boolean,
                default: false
            },
	    },
        data() {
            return {
                states: [],
                selectedStateId: 0,
	            isLoading: false
            }
        },
	    watch: {
		    selected(value){
                this.selectedStateId = value
		    }
	    },
        methods: {
            onChange(selectedStateId){
                this.$store.dispatch('getCities',selectedStateId);
                let state = this.states.find(item => item.id === selectedStateId);
                if(!_.isEmpty(state)) this.$emit('stateInputChange', state)
            },
            populate() {
                this.isLoading = true;
                axios.get(route('api.states.index'))
                    .then((response) => {
                        this.isLoading = false;
                        this.states = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.populate();

            this.$store.commit('UPDATE_STATES',this.states);

            this.selectedStateId = (this.selected) ? this.selected : null;
        },
    }
</script>