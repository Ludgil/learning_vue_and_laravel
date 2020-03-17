<template>
    <div>
        <div v-if='orderDetails && orderDetails.length > 0 '>
            <ul class="list-group">
                <li class="list-group-item" v-for="(orderDetail, key) in orderDetails" :key='key'>
                    {{orderDetail.name}}
                     <span class="float-right">
                         {{orderDetail.price}} <span class="m-l-3 pointer" @click="handleRemoveItem(orderDetail)">X</span>
                    </span>
                </li>
            </ul>
        </div>

        <div v-else>
            <p>No items ordered Yet</p>
        </div>
    </div>


</template>

<script>
export default {
    props: ['orderDetails'],
    methods : {
        handleRemoveItem(item){
            window.eventBus.$emit('removeOrderedItem', item);
        }
    }
}
</script>