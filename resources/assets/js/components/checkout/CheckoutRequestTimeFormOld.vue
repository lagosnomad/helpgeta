<template>
	<div>
		<b-field label="Start Date & Time" horizontal>
			<b-datepicker
					v-model="requestStartDate"
					:min-date="minDate"
					position="is-top-right"
					placeholder="Click to select..."
					icon="calendar-o">
			</b-datepicker>
			<b-timepicker
					v-model="requestStartTime"
					position="is-top-right"
					placeholder="Click to select..."
					icon="clock-o"
					hour-format="12">
			</b-timepicker>
		</b-field>

		<b-field label="End Date & Time" v-if="category.is_hourly_based" horizontal>
			<b-datepicker
					v-model="requestEndDate"
					:min-date="minDate"
					position="is-top-right"
					placeholder="Click to select..."
					icon="calendar-o">
			</b-datepicker>
			<b-timepicker
					v-model="requestEndTime"
					position="is-top-right"
					placeholder="Click to select..."
					icon="clock-o"
					hour-format="12">
			</b-timepicker>
		</b-field>
	</div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        name: 'CheckoutRequestTimeFormOld',
        props: ['category'],
        computed: {
            minDate(){
                let date = new Date();
                date.setDate(date.getDate() - 1);
                return date;
            },
            requestStartDate: {
                get () {
                    return this.$store.state.requestStartDate
                },
                set (value) {
                    this.$store.commit('ADD_REQUEST_DATE',this.setDateStateObject('requestStartDate',value))
                }
            },
            requestStartTime: {
                get () {
                    return this.$store.state.requestStartTime
                },
                set (value) {
                    this.$store.commit('ADD_REQUEST_DATE',this.setDateStateObject('requestStartTime',value))
                }
            },
            requestEndDate: {
                get () {
                    return this.$store.state.requestEndDate
                },
                set (value) {
                    this.$store.commit('ADD_REQUEST_DATE',this.setDateStateObject('requestEndDate',value))
                }
            },
            requestEndTime: {
                get () {
                    return this.$store.state.requestEndTime
                },
                set (value) {
                    this.$store.commit('ADD_REQUEST_DATE',this.setDateStateObject('requestEndTime',value))
                }
            },
        },
        methods:{
            setDateStateObject(name,value){
                return {name,value}
            }
        }
    }
</script>