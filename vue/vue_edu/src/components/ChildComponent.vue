<template>
    <h2>자식 컴포넌트</h2>
    <div v-for="item in props.data" :key="item">
        <span>{{ item.name }}</span>
    </div>
    <h2>{{ props.count }}</h2>
    <slot></slot>
<div>
      
 

</div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps({
   'data': Array
   ,'count': Number
});
</script>

<style>

</style>