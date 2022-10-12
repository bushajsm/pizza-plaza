<template>
<li class="cart-icon">
          <a href="#">
            <span class="icon"></span>
            <div class="link-text"><span>{{ (Math.round((total) * 100) / 100).toFixed(2)}} €</span></div>
        </a>
        <div class="cart-dropdown header-link-dropdown">
            <ul class="cart-list link-dropdown-list">
                <li  v-for="pizza in pizzas" :key="pizza.id">
                    <div class="media">
                        <a href="/" class="pull-left"> 
                            <img :src="`images/pizzas/${pizza.pizza[0].image_name}`" :alt="`${pizza.pizza[0].name}`"></a>
                        <div class="media-body"> <span><a href="#">{{pizza.pizza[0].name}}</a></span>
                            <p class="cart-price">{{pizza.cartItem.price}} €</p>
                        </div>
                    </div>
                </li>
            </ul>
            <p class="cart-sub-totle">
                <span class="pull-left">Cart Total</span>
                <span class="pull-right"><strong class="price-box">{{ (Math.round((total) * 100) / 100).toFixed(2)}} € </strong></span> </p>
            <div class="clearfix"></div>
            <div v-if="pizzas.length !=0" class="mt-20 text-left">
                <a href="/checkout" class="btn-color btn right-side">Proceed To Checkout</a>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        data(){
        return{
        pizzas:[]
        }
        },
        methods:{
        async getCartItems(){
        let response =  await  axios.get('/checkout/get/items');
        console.log(response);
        this.pizzas=response.data;
        },
            async deletePizza(pizzaId){
            let response = await axios.post('/delete-pizza/'+pizzaId,{_method: 'delete'})
              if(response.data.success){
                this.$toastr.s(response.data.success)
                this.getCartItems();
              }else{
                this.$toastr.e(response.data.error)
              }
            } 
        },
        created() {
        this.getCartItems();
        },
        computed: {
        total: function(){
            let total=0;
            for (const [key, pizza] of Object.entries(this.pizzas)) {
               total += pizza.cartItem.quantity*pizza.cartItem.price
            }
            return (Math.round((total) * 100) / 100).toFixed(2) 
        }
    },
    mounted(){
        this.$root.$on('updateCart', () => {
            this.getCartItems();
        });
    }
    }
</script>
