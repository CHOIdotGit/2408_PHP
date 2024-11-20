<template>
    <div class="board-list-box">
        <div @click="openModal" class="item">
            <img src="/img/Pat_Mat.jpg">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/ine.png">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/3555945685_NPDB9lJX_r_3062642482_3136c79ba0892a976194282b814dc775a673e421.jpg">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/licensed-image.jpg">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/미어캣은_속았습니다.png">
        </div>
    </div>

    <!-- Detail Modal -->
    <div v-show="modalFlg" class="board-detail-box">
        <div class="item">
            <img src="/img/ine.png">
            <hr>
            <p>아이네하이네</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : Nia</span>
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