<template>
<!-- vueinit를 사용하면 자동완성 -->
    <p>자식쪽 cnt : {{ props.cnt }}</p>
    <div class="btn">
        <button @click="$emit('eventAddCnt')">자식쪽 증가 버튼</button>
        <button @click="$emit('eventAddCntParam', 2)">자식쪽에서 2씩 증가</button>
        <button @click="$emit('eventResetCnt')">자식쪽 초기화</button>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps({
    'cnt': Number
})
</script>

<style scoped>
.btn{
    display: flex;
    justify-content: center;
    gap: 1rem;
}
</style>