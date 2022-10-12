<template>
   <section class="shopping-cart ptb">
    <div class="container">
        <div class="cart-item-table commun-table">
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead>
                        <tr>
                            <th class="align-left">Pizza</th>
                            <th class="align-left">Pizza Name</th>
                            <th>Price</th>
                            <th>Extras</th>
                            <th>Quantity</th>                         
                            <th>Sub Total</th>
                            <th>Selected Ex.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pizza in pizzas" :key="pizza.id">
                            <td class="align-left">
                                <a href="#">
                                    <div class="product-image">
                                        <img :src="`images/pizzas/${pizza.pizza[0].image_name}`" :alt="`${pizza.pizza[0].name}`">
                                    </div>
                                 </a>
                            </td>
                            <td class="align-left">
                                <div class="product-title"> 
                                    <a href="#">{{pizza.pizza[0].name}}</a> 
                                </div>
                            </td>
                            <td>
                            <div class="base-price price-box"> 
                            <span class="price"> {{(Math.round((pizza.cartItem.price) * 100) / 100).toFixed(2) }} €</span> 
                            </div>
                            </td>
                            <td>
                               
                             <div  v-for="extra in pizza.extras" :key="extra.extraName" class="checkbox-inline">
                            <input class="form-check-input" type="checkbox" @change="check($event,pizza.cartItem.pizza_id,extra.extraName,extra.extraPrice)">
                            <label class="form-check-label">{{extra.extraName}}<span class="m-color"> + {{extra.extraPrice}} € </span></label>  
                        </div>
                            </td>
                            <td>
                                <div class="cart">
                                    <button
                                    @click="updateQty(pizza.cartItem.pizza_id, 'subtract')"
                                    class="cart__button"
                                    >
                                    -
                                    </button>
                                    <span class="cart__quantity">{{pizza.cartItem.quantity}}</span>
                                    <button
                                    @click="updateQty(pizza.cartItem.pizza_id, 'add')"
                                    class="cart__button"
                                    >
                                    +
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="total-price price-box"> 
                                    <span class="price">{{ (Math.round((pizza.cartItem.quantity*pizza.cartItem.price) * 100) / 100).toFixed(2)}} € </span> 
                                </div>
                            </td>
                            <td style="width:100px">
                                <div class="total-price price-box">
                                    {{pizza.cartItem.selectedExtras}}
                                </div> 
                            </td>
                            <td style="width:30px">
                                   <button v-on:click.prevent="deletePizza(pizza.cartItem.pizza_id)" class="btn small btn-color">
                                    <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
                                   </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-30">
        </div>
        <hr>
        <div class="mtb-30">
            <div class="row">
                <div class="col-md-8 mb-sm-20">
                    <div class="estimate">
                        <div class="heading-part mb-20">
                            <h3 class="sub-heading text-center-r">Order Detail</h3>
                        </div>
                        <form class="full">
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group  mb-20">
                                        <input v-model="firstName" type="text" class="form-control" placeholder="First Name" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  mb-20">
                                        <input v-model="lastName" type="text" class="form-control" placeholder="Last Name" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  mb-20">
                                        <input v-model="phone" type="text" class="form-control" placeholder="Phone Number" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  mb-20">
                                        <input v-model="email" type="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  mb-20">
                                        <input v-model="city" type="text" class="form-control" placeholder="City" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  mb-20">
                                        <input v-model="address" type="text" class="form-control" placeholder="Address" required="">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-total-table commun-table">
                        <div class="table-responsive">
                            <table class="table border">
                                <thead>
                                    <tr>
                                          <th colspan="2" class="text-center-r">Cart Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                          <td>Pizza(s) Total</td>
                                          <td>
                                            <div class="price-box"> 
                                                  <span class="price">{{total}} € </span> 
                                            </div>
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>Delivery Fees</td>
                                          <td>
                                            <small>Delivery is available only for the amount over 10 € with delivery charge of 1.5 €,
                                                orders over 25 € are free of the delivery charge
                                           </small>
                                            <div class="price-box"> 
                                                  <span class="price">{{deliveryFees}} €</span> 
                                            </div>
                                          </td>
                                    </tr>
                                    <tr>
                                          <td><b>Total</b></td>
                                          <td>
                                            <div class="price-box"> 
                                                  <span class="price"><b>{{Number(total)+Number(deliveryFees)}} € </b></span>
                                                  <span class="text-success">{{message}}</span>
                                            </div>
                                          </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="mt-30">
            <div class="row">
                <div class="col-12">
                    <div class="right-side float-none-xs text-center-r float-none-sm"> 
                        <button v-on:click.prevent="placeOrder()" class="btn btn-color">Place Order
                            <span><i class="fa fa-angle-right"></i></span>
                        </button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
    export default {
        data(){
        return{
          
        firstName:'',
        lastName:'',
        phone:'',
        email:'',
        city:'',
        address:'',
        pizzas:[]
        }
        },
        methods:{
        async getCartItems(){
        let response =  await  axios.get('/checkout/get/items');
        console.log(response);
        this.pizzas=response.data;
        },
        updateQty(pizzaId, updateType){
            for (const [key, pizza] of Object.entries(this.pizzas)) {
                if (pizza.cartItem.pizza_id === pizzaId) {
                    if (updateType === 'subtract') {
                    if (pizza.cartItem.quantity > 1) {
                        pizza.cartItem.quantity--;
                    }else{
                     this.deletePizza(pizzaId) 
                    }
                    } else {
                        pizza.cartItem.quantity++;
                    }
                    
                    break;
                }
            }

        /*  for (let i = 0; i < this.pizzas.length; i++) {
          if (this.pizzas[i].id === pizza.pizza_id) {
            if (updateType === 'subtract') {
              if (this.pizzas[i].quantity !== 0) {
                this.pizzas[i].quantity--;
              }
            } else {
              this.pizzas[i].quantity++;
            }
            
            break;
          }
        }*/
        },
        async placeOrder(){
            if(this.firstName!='' && this.lastName!='' && this.phone !=''&& this.email !=''&& this.city !=''&& this.address !=''){
             //process payment
             //proceed
              let response = await axios.post('place-order',{
                'firstName':this.firstName,
                'lastName':this.lastName,
                'phone':this.phone,
                'email':this.email,
                'city':this.city,
                'address':this.address, 
                'total':Number(this.total)+Number(this.deliveryFees),
                'orders': this.pizzas,
                'message':''
              })
              if(response.data.success){
                this.$toastr.s(response.data.success)
              }else{
                this.$toastr.e(response.data.error)
              }
              setTimeout(() => {
                window.location.href='/my-orders';
              }, 2000);
            }else{
                this.$toastr.e('User Information is not complete')
            }
        },
        check(e,pizzaId,extraName,extraPrice) {  
            for (const [key, pizza] of Object.entries(this.pizzas)) {
                if (pizza.cartItem.pizza_id === pizzaId) {
                    if (e.target.checked == true) {
                        pizza.cartItem.price=pizza.cartItem.price + extraPrice;
                        pizza.cartItem.selectedExtras += `${extraName} , `  ;  
                    } else {
                        pizza.cartItem.price=pizza.cartItem.price - extraPrice;
                        pizza.cartItem.selectedExtras =pizza.cartItem.selectedExtras.replace(`${extraName} , `, '') ; 
                    }                   
                    break;
                }
            }

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
            console.log(typeof(total))
            return (Math.round((total) * 100) / 100).toFixed(2) 
        },
        deliveryFees: function(){
         let deliveryFees;
         if (this.total <= 25 && this.total > 10){
             deliveryFees=1.5;
            }else{
            deliveryFees=0;
            }
         return (Math.round((deliveryFees) * 100) / 100).toFixed(2) 
        }
}
    }
</script>
<style scoped>
.cart__button {
    background: #ea3c12;
    border: 0;
    color: white;
    cursor: pointer;
    font-size: 1.5rem;
    height: 1.5rem;
    width: 1.5rem;
    border-radius: 5px;
    padding: 3px;

} 
.m-color{
    color:#ea3c12;
}
.cart__quantity {
  font-size:18px;
  margin: 0 0.5rem;
}
</style>
