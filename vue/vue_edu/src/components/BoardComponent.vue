<template>
<!-- HTML 영역 -->
 <div>
    <h2 @click="addCnt">{{ cnt }}</h2>
    <h2 @click="disCnt">{{ cnt }}</h2>
    <hr>
    <input class="number" type="text" v-model="tel">
    <span :style="color">{{ msg }}</span>
 </div>
</template>

<script setup>
// JS 영역
import { ref, watch } from 'vue';

// Watchers 감시자(실시간) - validation과 비슷한 효과를 낼 수 있다
const tel = ref('');
const msg = ref(' X');
const color = ref('color: red;');

watch(tel, (val) => {
    const regex = /^[0-9]{10,11}$/;
    if(!regex.test(val)) {
        msg.value = ' X';
        color.value = 'color: red;';
    } else {
        msg.value = 'O';
        color.value = 'color: green;';
    }
});

const cnt = ref(0);
function addCnt() {
    cnt.value++;
}
function disCnt() {
    cnt.value--;
}
// 위를 누르면 증가하고 밑을 누르면 내려간다. 2개가 한꺼번에 적용된다.
</script>

<style>
/* CSS 영역 */
.number{
    border: 1px solid;
    outline: none;
    border-radius: 5px;
}
</style>