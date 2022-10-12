<template>
    <section class="shopping-cart ptb">
     <div class="container">
         <div v-if="orders.length !=0" class="cart-item-table commun-table">
             <div class="table-responsive">
                 <table class="table border mb-0">
                     <thead>
                         <tr>
                             <th class="align-left">Order ID</th>
                             <th class="align-left">Pizzas Quantity Extras</th>                  
                             <th>Total</th>
                             <th>Date</th>
                             <th>Status</th>
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
                                    
                                        Pizza: {{value.cartItem.pizza[0].name}} / Quantity: {{value.cartItem.quantity}} / Extras: {{value.cartItem.selectedExtras }}
                                    </li>
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
                                <div class="text-warning" v-if="order.status===0">Processing</div>
                                <div class="text-success" v-else>Completed</div>                              
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
     </div>
 </section>
 </template>
 
 <script>
     export default {
         data(){
         return{         
         orders:[]
         }
         },
         methods:{
         async getOrderItems(){
         let response =  await  axios.get('/orders/get/items');
         this.orders=response.data;
         }
         },
         created() {
         this.getOrderItems();
         },
         computed: {
         }
     }
 </script>
 <style scoped>
 .m-color{
    color:#ea3c12;
}
 </style>
 