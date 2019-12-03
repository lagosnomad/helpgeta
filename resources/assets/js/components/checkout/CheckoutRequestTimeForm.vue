<template>
	<div>
		<b-field grouped v-for="(item,key) in items" :key="key">
			<div class="field has-addons">
				<p class="control">
					<a class="button is-static">
						Date
					</a>
				</p>
				<div class="control has-icons-left">
					<datetime
							type="datetime"
							v-model="item.date"
							:min-datetime="minDate"
							class="theme-blue"
							input-class="input"
							placeholder="Click to select"
							use12-hour
							auto>
					</datetime>
					<span class="icon is-left"><i class="fa fa-calendar-o fa-lg"></i></span>
				</div>
			</div>

			<div class="field has-addons" v-if="category.is_hourly_based">
				<p class="control">
					<a class="button is-static">
						Hours
					</a>
				</p>
				<b-input
						v-model="item.hours"
						placeholder="Enter no. of hours"
						min="1"
						max="12"
						type="number"
						value="" expanded>
				</b-input>

			</div>
			<div class="field" v-if='key != 0'>
				<p class="control">
					<a href="#" class="has-text-danger" @click.prevent="removeItem(key)"><span class="icon"><i class="fa fa-trash"></i></span></a>
				</p>
			</div>
		</b-field>

		<div>
			<a href="#" class="button is-primary is-small" @click.prevent="addItem">Add More Days</a>
		</div>


	</div>
</template>

<script>
    import moment from 'moment';
    import { Datetime } from 'vue-datetime';
    export default {
        name: 'CheckoutRequestTimeForm',
        props: ['category'],
	    components:{Datetime},
	    data(){
            return {
                items: [
                    {date: null, hours: null}
                ]
            }
	    },
	    watch: {
          items: {
              handler(value){
                  this.$store.commit('UPDATE_REQUEST_DATES',value)
              },
	          deep: true
          }
	    },
	    computed: {
            minDate() {
                return moment().toISOString();
            },
        },
        methods: {
            addItem(){
                this.items.push({date: null, hours: null});
            },
            removeItem(key){
				this.items.splice(key,1);
            }
        }
    }
</script>

<style lang="scss" scoped>
	.field.is-grouped{
		margin-bottom: 1rem;
		.field{
			margin-bottom: 0 !important;
		}
	}
</style>