export default {
	GET_PRODUCTS:(state,product) =>{
        return new Promise((resolve, reject) => {
            if(product == undefined){
                axios.get('/admin/products').then((response)=>{
                    state.state.products = response.data;
                    resolve(response.data);
                }).catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else {

                    }
                });
            } else {
                axios.get(`/admin/products/${product}`).then((response)=>{
                    state.state.products.push(response.data);
                    resolve(response.data);
                }).catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else {

                    }
                });
            }
        });

	}
}