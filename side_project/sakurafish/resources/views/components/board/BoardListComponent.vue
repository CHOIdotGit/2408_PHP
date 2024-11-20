<template>
    <div class="board-list-box">
        <div @click="openModal" class="item">
            <img src="/img/29385787.jpg">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/dn.jpg">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/promise_chansol21.jpg">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/stardust.jpg">
        </div>
    </div>

    <!-- Detail Modal -->
    <div v-show="modalFlg" class="board-detail-box">
        <div class="item">
            <img src="/img/sakurafish.jpg">
            <hr>
            <p>불꽃심장을 추억하며</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : Nia - 관리자</span>
                <button @click="closeModal">닫기</button>
            </div>
        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue';

// 모달 관련
const modalFlg = ref(false);
const openModal = () => {
    modalFlg.value = true;
}
const closeModal = () => {
    modalFlg.value = false;
}

</script>

<style>
    @import url('../../../css/boardList.css');

</style>