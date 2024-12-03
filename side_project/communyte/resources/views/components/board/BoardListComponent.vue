<template>
    <!-- 게시글 -->
    <div class="board-box">
        <div v-for="item in boardList" :key="item" @click="openModal(item.board_id)" class="b-content">
            <img :src="item.img">
        </div>
    </div>

    <!-- 모달 -->
    <div v-show="modalFlg" class="modal">
        <div v-if="boardDetail">
            <img :src="boardDetail.img">
            <hr>
            <p>{{ boardDetail.content }}</p>
            <p>{{ boardDetail.like }}</p>
            <hr>
            <div>
                <span>작성자 : {{ boardDetail.user.name }}</span>
                <button @click="closeModal" class="btn bg-bk">닫기</button>
            </div>
        </div>
    </div>
</template>

<script setup>

import { computed, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

// board detail info
const boardDetail = computed(() => store.state.board.boardDetail);

// board list
const boardList = computed(() => store.state.board.boardLst);

// before mount ?? 아마 페이지 관련인가?
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1) {
        store.dispatch('board/boardListPagination')
    }
});

// 모달 - 클릭 이벤트
const modalFlg = ref(false);
const openModal = (id) =>{
    store.dispatch('board/showBoard', id);
    modalFlg.value = true;
}
const closeModal = () => {
    modalFlg.value = false;
}
</script>

<style>
    @import url('../../../css/boardList.css');
</style>