<template>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col" style="width: 25%">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product) in products.data" :key="product.id">
                    <th scope="row">{{product.id}}</th>
                    <td>{{product.name}}</td>
                    <td>{{product.category}}</td>
                    <td>{{product.description}}</td>
                    <td>{{product.datetime | formatDate}}</td>
                    <td>Edit | Delete</td>
                    </tr>
                </tbody>
            </table>
            <pagination :data="products" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                products: {},
                name: '',
                category: '',
                description: '',
                datetime: ''
            }
        },
        mounted() {
            this.getResults();
        },
        methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('api/product?page='+page)
				.then(response => {
					this.products = response;
				});
		}
	}

    }
</script>
