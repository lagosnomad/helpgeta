<template>
	<div>
		<b-field grouped v-for="(item,key) in items" :key="key">
			<div class="field" v-if='key != 0'>
				<label class="label">&nbsp;</label>
				<p class="control">
					<a href="#" class="has-text-danger" @click.prevent="removeItem(key)"><span class="icon"><i class="fa fa-trash"></i></span></a>
				</p>
			</div>
			<b-field label="Day" expanded>
				<b-datepicker
						v-model="item.day"
						:min-date="minDate"
						position="is-top-right"
						placeholder="Click to select..."
						icon="calendar-o">
				</b-datepicker>
			</b-field>
			<b-field label="Time" expanded>
				<b-timepicker
						v-model="item.time"
						position="is-top-right"
						placeholder="Click to select..."
						icon="clock-o"
						hour-format="24">
				</b-timepicker>
			</b-field>
			<b-field label="No. of Hours" v-if="category.is_hourly_based" expanded>
				<b-input
						v-model="item.hours"
						placeholder="Enter no. of hours"
						type="number"
						value="" expanded>
				</b-input>

			</b-field>
		</b-field>

		<div>
			<a href="#" class="button is-primary is-small" @click.prevent="addItem">Add More Days</a>
		</div>


	</div>
</template>

<script>
    import moment from 'moment';
    export default {
        name: 'CheckoutRequestTimeForm2',
        props: ['category'],
	    data(){
            return {
                items: [
                    {day: null, time: null, hours: null}
                ]
            }
	    },
	    watch: {
          items: {
              handler(value){
                  this.$store.commit('ADD_REQUEST_DATE',value)
              },
	          deep: true
          }
	    },
	    computed: {
            minDate() {
                let date = new Date();
                date.setDate(date.getDate() - 1);
                return date;
            },
        },
        methods: {
            addItem(){
                this.items.push({day: null, time: null, hours: null});
            },
            removeItem(key){
				this.items.splice(key,1);
            }
        }
    }
</script>