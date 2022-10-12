<template>
        <li  class="level3"><a href="/checkout" ><span>■</span>Cart</a></li>
</template>

<script>
    export default {
        data(){
        return{
            itemCount:''
        }
        },
        methods:{
        async getCartItemsOnPageLoad(){
                let response =  await axios.post('/cart');
                this.itemsCount=response.data.items;
         }
        },
        created(){
            this.getCartItemsOnPageLoad()
        },
        mounted() {
            /*
           this.$root.$on('changeInCart',(item)=>{
            this.itemCount=item
           })*/
        }
    }
</script>
