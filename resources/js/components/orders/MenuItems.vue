<template>
        <ul class="list-group">
            <li class="list-group-item" v-for="(item,key) in items" :key="key">
                <div class="row">
                    <div class="col-md-10">
                        {{item.name}} <span class="float-right">{{item.price}}</span>
                        <br>
                        {{item.category.name}}
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-small" @click='handleAddButtonClick(item)'>Add</button>
                    </div>
                </div>
             </li>
        </ul>
       
</template>

<script>

export default {
    props : [
        'items'
        ],
    methods: {
        handleAddButtonClick(item){
            window.eventBus.$emit('addMenuItem', item);
        }
    }
}
</script>