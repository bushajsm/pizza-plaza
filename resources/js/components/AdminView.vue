<template>
    <section class="shopping-cart ptb">
     <div class="container">
        <h2>Customers Orders</h2>
        <br>
         <div v-if="orders.length !=0" class="cart-item-table commun-table">
             <div class="table-responsive">
                 <table class="table border mb-0">
                     <thead>
                         <tr>
                             <th class="align-left">Order ID</th>
                             <th class="align-left">Pizzas Quantity Extras</th>                  
                             <th class="align-left">Customer Details</th>
                             <th>Total</th>
                             <th>Date</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr v-for="order in orders" :key="order.id">
                             <td class="align-left">
                                 #{{order.id}}
                             </td>
                             <td class="align-left">
                                 <ul>
                                    <li v-for="[key, value] in Object.entries(JSON.parse(order.orderDetails))" :key="key">
                                        <span>■</span>  
                                        Pizza: {{value.cartItem.pizza[0].name}} / Quantity: {{value.cartItem.quantity}} / Extras: {{value.cartItem.selectedExtras }}
                                        
                                    </li>
                                 </ul>
                             </td>
                             <td class="align-left">
                                <ul>
                                    <li>Name:{{order.firstName}} {{order.lastName}}</li>
                                    <li>Phone: {{order.phone}}</li>
                                    <li>Email: {{order.email}}</li>
                                    <li>City: {{order.city}}</li>
                                    <li>Address: {{order.address}}</li>
                                </ul>
                             </td>
                             <td>
                             <div class="base-price price-box"> 
                             <span class="price">{{order.total}} €</span> 
                             </div>
                             </td>
                             <td>
                                {{new Date(order.created_at).toLocaleDateString()}} - {{new Date(order.created_at).toLocaleTimeString()}}
                             </td>
                             <td>
                                <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" :id="`customSwitchOrder${order.id}`" @click="check($event,order.id)" :checked="order.status">
                                <label class="custom-control-label" :for="`customSwitchOrder${order.id}`">Mark as Completed</label>
                                </div>
                                <div class="text-warning" v-if="order.status===0">Processing</div>
                                <div class="text-success" v-else>Completed</div>   
                                 
                             </td>
                             <td>
                                   <button v-on:click.prevent="deleteOrder(order.id)" class="btn small btn-color">
                                    <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
                                   </button>
                            </td>                           
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
         <div v-else>
            No Orders To display
         </div>
         <div class="mb-30">
         </div>
         <hr>
         <h2>pizzas (pizza of the day price is always reduced by 33%)</h2>
        <br>
         <div v-if="pizzas.length !=0" class="cart-item-table commun-table">
             <div class="table-responsive">
                 <table class="table border mb-0">
                     <thead>
                         <tr>
                             <th class="align-left">Pizza ID</th>
                             <th class="align-left">Image</th>  
                             <th>Name</th>                  
                             <th>Description</th>
                             <th>Price</th>
                             <th>Pizza Of The Day</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr v-for="pizza in pizzas" :key="pizza.id">
                             <td class="align-left">
                                 #{{pizza.id}}
                             </td>
                             <td class="align-left">
                                <div class="product-image">
                                        <img :src="`images/pizzas/${pizza.image_name}`" :alt="`${pizza.name}`">
                                    </div>  
                             </td>
                             <td class="align-left">
                                {{pizza.name}}
                             </td>
                             <td>
                             <div> 
                                {{pizza.description}}
                             </div>
                             </td>
                             <td>
                                <div class="base-price price-box"> 
                                <span class="price">{{pizza.price}} €</span> 
                                </div>
                             </td>
                             <td>
                                <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" :id="`customSwitch${pizza.id}`" @click="checkPizzaOfTheDay($event,pizza.id)" :checked="pizza.pizza_of_the_day">
                                <label class="custom-control-label" :for="`customSwitch${pizza.id}`">Mark as Pizza Of The Day</label>
                                </div>
                                 
                             </td>                           
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
         <div v-else>
            No Pizzas To display
         </div>
         <div class="mb-30">
         </div>
         <hr>
     </div>
 </section>
 </template>
 
 <script>
     export default {
         data(){
         return{         
         orders:[],
         pizzas:[]
         }
         },
         methods:{
         async getOrderItems(){
         let response =  await  axios.get('/admin/orders/get/items');
         this.orders=response.data;
         },
         async getPizzasItems(){
         let response =  await  axios.get('/admin/pizzas/get/items');
         this.pizzas=response.data;
         },
         async check(e,orderId) {  
            let status;
            if (e.target.checked == true) {
                status=1
            }else{
                status=0
            }
            let response = await axios.put('/order/update-status/'+orderId, {status:status})
            if(response.data.success){
                this.$toastr.s(response.data.success)
                this.getOrderItems();
              }else{
                this.$toastr.e(response.data.error)
              }
         },
         async checkPizzaOfTheDay(e,pizzaId) {  
            let pizza_of_the_day;
            if (e.target.checked == true) {
                pizza_of_the_day=1
            }else{
                pizza_of_the_day=0
            }
            let response = await axios.put('/pizza/update-pizza/'+pizzaId, {pizza_of_the_day:pizza_of_the_day})
            if(response.data.success){
                this.$toastr.s(response.data.success)
              }else{
                this.$toastr.e(response.data.error)
              }
         },
         async deleteOrder(orderId){
            let response = await axios.post('/delete-order/'+orderId,{_method: 'delete'})
              if(response.data.success){
                this.$toastr.s(response.data.success)
                this.getOrderItems();
              }else{
                this.$toastr.e(response.data.error)
              }
            } 
         },
         created() {
         this.getOrderItems();
         this.getPizzasItems();
         },
         computed: {
         }
     }
 </script>
 <style scoped>
 ul span{
    color:#ea3c12;
}
 </style>
 