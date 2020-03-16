<template>
    <div class="row">
        <div class="col-md-7">
            <div class="mb-5">
                <h3>Customer details</h3>
                <order-form></order-form>
            </div>

            <div class="mb-5">
                <h3>Order details <span class="float-right" v-if='finalAmount > 0'>{{finalAmount}}</span></h3>
                <order-details :order-details='orderDetails'></order-details>
            </div>
        </div>
   

        <div class="col-md-5">
            <h3>Menu</h3>
            <order-menu-items 
                :items='menuItems'
                @menuItemAdded="handleNewMenuItem"
            
            ></order-menu-items>
        </div>
    </div>
</template>

<script>
import OrderForm from './OrderForm.vue';
import OrderMenuItems from './OrderMenuItems.vue';
import OrderDetails from './OrderDetails.vue';
import axios from 'axios';
export default {

    props: [
        'restoId'
    ],

    components: {
        OrderForm,
        OrderMenuItems,
        OrderDetails
    },

    created() {
        this.loadRestoMenuItems();
        window.eventBus.$on('addMenuItem', this.handleNewMenuItem);
        window.eventBus.$on('filteredList', this.handleFilteredList);
        window.eventBus.$on('clearFilteredList', this.handleClearFilteredList);
    },

    computed:{
        finalAmount(){
            let price = 0;

            this.orderDetails.forEach(order =>{
                price = price+order.price;
            });
            return price;
        }
    },

    data() {
        return {
            menuItems: [],
            orderDetails: [],
            originalMenuItems: [],
        }
    },

    methods: {
        loadRestoMenuItems(){
            let postData = {restoId: this.restoId};
            axios.post('/api/resto/menu', postData)
                .then(response => {
                    this.menuItems = response.data
                    this.originalMenuItems = response.data
                })
                .catch(error => console.error(error.response));
        },

        handleNewMenuItem(item){
            this.orderDetails.unshift(item);
        },

        handleFilteredList(filteredList) {
            this.menuItems = filteredList;
        },

        handleClearFilteredList(){
            this.menuItems = this.originalMenuItems;
        }

    }

    
}
</script>