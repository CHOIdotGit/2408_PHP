<template>
    <!-- <div v-if="loading" class="d-flex justify-content-center">
        <h1>Loading...</h1>
    </div> -->

    <div class="board-list-box">
        <div v-for="item in boardList" :key="item" @click="openModal(item.board_id)" class="item">
            <img :src="item.img">
        </div>
    </div>

    

    <!-- Detail Modal -->
    <div v-show="modalFlg" class="board-detail-box">
        <div v-if="boardDetail" class="item">
            <img :src="boardDetail.img">
            <hr>
            <p>{{ boardDetail.content }}</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : {{ boardDetail.user.name }}</span>
                <button @click="closeModal">닫기</button>
            </div>
        </div>
    </div>
</template>

<script setup>

import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

// 임의코드 - 로딩 화면
// let loading = computed(() => store.state.board.isLoading);

// 보드 상세 정보
const boardDetail = computed(() => store.state.board.boardDetail);

// 보드리스트
const boardList = computed(() => store.state.board.boardList);

// before mount 처리
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1) {
        store.dispatch('board/boardListPagenation')
    }
});

// 스크롤 이벤트 관련
const boardScrollEvent = () => {
    if(store.state.board.controllFlg) {
        const docHeight = document.documentElement.scrollHeight; // 문서 기준 Y축 총 길이
        const winHeight = window.innerHeight; // 윈도우의 Y축 총 길이
        const nowHeight = window.scrollY; // 현재 스크롤 위치
        const viewHeight = docHeight - winHeight; // 끝까지 스크롤 했을 때  Y축 위치

        // console.log('스크롤 이벤트');
        if(viewHeight <= nowHeight) {
            store.dispatch('board/boardListPagenation');
        }
        
    }
}

window.addEventListener('scroll', boardScrollEvent);

// 모달 관련
const modalFlg = ref(false);
const openModal = (id) => {
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