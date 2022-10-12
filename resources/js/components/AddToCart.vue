<template>
    <div>
        <button class="btn btn-warning text-center mt-20 mb-20" 
        v-on:click.prevent="addPizzaToCart">Add To Cart</button>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        data(){
        return{
            
        }
        },
        props:['pizzaId','userId'],
        methods:{
            async addPizzaToCart(){
                //check if user logged in
                 if(this.userId==0){
                    this.$toastr.e('You need to login to add to cart')
                    return
                 }
                 //if user logged in add pizzas to cart
                 let response =  await  axios.post('/cart',{
                    'pizza_id':this.pizzaId
                 })

                 //let the cart in nav bar knows that change happened
                 this.$root.$emit('updateCart');


                 //console.log(response.data.items);
                 this.$toastr.s('Pizza added to cart successfully')
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
