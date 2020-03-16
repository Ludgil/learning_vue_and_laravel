<template>
    <menu-items :items="items"></menu-items>
  
</template>

<script>
import MenuItems from './MenuItems';
export default {
    
    components:{
        MenuItems
    },

    props: [
        'items'
    ],
   
}
</script>