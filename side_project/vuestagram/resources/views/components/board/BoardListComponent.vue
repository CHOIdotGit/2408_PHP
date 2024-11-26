<template>
    <div class="board-list-box">
        <div v-for="item in boardList" :key="item" @click="openModal" class="item">
            <img :src="item.img">
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

import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

// 보드리스트
const boardList = computed(() => store.state.board.boardList);

// before mount 처리
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1) {
        store.dispatch('board/getBoardListPagenation')
    }
});

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