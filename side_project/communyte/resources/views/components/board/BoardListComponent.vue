<template>
    <!-- 게시글 -->
    <div class="board-box">
        <div @click="openModal()" class="b-content">
            <img src="/img/1664526605722.jpg">
            <h3>제목제목</h3>
            <p>내용내용</p>
            <p>like</p>
        </div>
        <div @click="openModal()" class="b-content">
            <img src="/img/1664526605722.jpg">
            <h3>제목제목</h3>
            <p>내용내용</p>
            <p>like</p>
        </div>
        <div @click="openModal()" class="b-content">
            <img src="/img/1664526605722.jpg">
            <h3>제목제목</h3>
            <p>내용내용</p>
            <p>like</p>
        </div>
        <div @click="openModal()" class="b-content">
            <img src="/img/1664526605722.jpg">
            <h3>제목제목</h3>
            <p>내용내용</p>
            <p>like</p>
        </div>
    </div>

    <!-- 모달 -->
    <div class="modal">
        <div>
            <img src="">
            <hr>
            <p>내용내용</p>
            <hr>
            <div>
                <span>작성자 : 이름</span>
                <button @click="closeModal" class="btn bg-bk">닫기</button>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';

    // 모달 상태 관리?
    const modalFlg = ref(false);

    // 모달 열기
    const openModal = () => {
    modalFlg.value = true;
    }

    // 모달 닫기
    const closeModal = () => {
        modalFlg.value = false;
    } 
</script>

<style>
    @import url('../../../css/boardList.css');
</style>