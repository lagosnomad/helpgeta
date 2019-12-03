<template>
	<div>
		<div class="field">
			<b-switch v-model="populateUserLocation">
				Use my profile address
			</b-switch>
		</div>
		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">Phone Number</label>
					<p class="control">
						<input class="input" placeholder="Enter your phone number" v-model="phone">
					</p>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">Address</label>
					<p class="control">
						<textarea class="textarea" placeholder="Enter your location address" v-model="address" rows="2"></textarea>
					</p>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<label class="label">Closest Landmark</label>
					<p class="control">
						<textarea class="textarea" placeholder="Enter closest landmark" v-model="landmark" rows="2"></textarea>
					</p>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="field">
					<label class="label">State</label>
					<p class="control">
						<states-select-input :selected="userStateId" @stateInputChange="updateStateId"></states-select-input>
					</p>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<label class="label">City</label>
					<p class="control">
						<cities-select-input :selected="userCityId" @cityInputChange="updateCityId"></cities-select-input>
					</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    import StatesSelectInput from '../states/StatesSelectInput'
    import CitiesSelectInput from '../cities/CitiesSelectInput'
    import {mapGetters} from 'vuex';
    export default {
        name: 'CheckoutLocationForm',
        data(){
            return {
                populateUserLocation : false
            }
        },
	    watch: {
            populateUserLocation(value){
                if(value){
                    this.$store.commit('UPDATE_USER_ADDRESS',this.user.address);
                    this.$store.commit('UPDATE_USER_PHONE',this.user.phone);
                    this.$store.commit('UPDATE_USER_STATE_ID',this.user.state_id);
                    this.$store.commit('UPDATE_USER_CITY_ID',this.user.city_id);
                }else{
                    this.$store.commit('UPDATE_USER_ADDRESS','');
                    this.$store.commit('UPDATE_USER_PHONE','');
                    this.$store.commit('UPDATE_USER_STATE_ID',null);
                    this.$store.commit('UPDATE_USER_CITY_ID',null);
                }
            }
	    },
	    computed: {
            phone: {
                get () {
                    return this.userPhone
                },
                set (value) {
                    this.$store.commit('UPDATE_USER_PHONE',value);
                }
            },
            address: {
                get () {
	                return this.userAddress
                },
                set (value) {
                    this.$store.commit('UPDATE_USER_ADDRESS',value);
                }
            },
            landmark: {
                get() {
                    return this.userLandmark
                },
                set (value) {
                    this.$store.commit('UPDATE_USER_LANDMARK',value);
                }
            },
		    ...mapGetters([
		        'user',
			    'userAddress',
			    'userPhone',
			    'userLandmark',
			    'userStateId',
			    'userCityId',
		    ])
	    },
	    methods: {
            updateStateId(state){
                this.$store.commit('UPDATE_USER_STATE_ID',state.id);
            },
            updateCityId(city){
                this.$store.commit('UPDATE_USER_CITY_ID',city.id);
            }
	    },
        components: {
            StatesSelectInput,
            CitiesSelectInput
        }
    }
</script>