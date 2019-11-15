<template>
	<div>
		<div class="filter-box level">
			<div class="level-left">
				<div class="field has-addons">
					<div class="control">
						<a class="button is-static">
							Sort By
						</a>
					</div>
					<div class="control">
						<div class="dropdown is-hoverable">
							<div class="dropdown-trigger">
								<a class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
									<span>Ratings</span>
									<span class="icon is-small"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
								</a>
							</div>
							<div class="dropdown-menu" id="dropdown-menu4" role="menu">
								<div class="dropdown-content">
									<div class="dropdown-item">
										<a href="#">High to Low</a>
									</div>
									<div class="dropdown-item">
										<a href="#">Low to High</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="control">
						<div class="dropdown is-hoverable">
							<div class="dropdown-trigger">
								<a class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
									<span>Location</span>
									<span class="icon is-small"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
								</a>
							</div>
							<div class="dropdown-menu" id="dropdown-menu4" role="menu">
								<div class="dropdown-content">
									<div class="dropdown-item">
										<states-select-input></states-select-input>
									</div>
									<div class="dropdown-item">
										<cities-select-input></cities-select-input>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="level-right">
				<div class="field has-addons">
					<div class="control is-expanded">
						<input class="input" type="text" placeholder="Search for a service provider">
					</div>
					<div class="control">
						<button class="button is-primary">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import StatesSelectInput from '../states/StatesSelectInput'
	import CitiesSelectInput from '../cities/CitiesSelectInput'
    export default {
        name: 'ArtisansFilterBox',
	    components: {
            StatesSelectInput,
		    CitiesSelectInput
	    }
    }
</script>