<template>
    <div v-for="item in products" :key="item">
        <h2 @click="openDetailModal(item)">{{ item.productName }}</h2>
        <p>{{ item.productContent }}</p>
        <p>{{ item.productPrice }}원</p>
    </div>

    <!-- detail modal -->
    <Transition name="detailModalAnimation">
        <div class="bg-modal-black" v-show="flgDetail">
            <div class="bg-modal-white">
                <h2>{{ detailProduct.productName }}</h2>
                <p>{{ detailProduct.productContent }}</p>
                <p>{{ detailProduct.productPrice }}</p>
                <button @click="closeDetailModal">닫기</button>
            </div>
        </div>
    </Transition>
</template>

<script setup>
import { computed, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
const products = computed(() => store.state.board.products);

// detail modal controll(상세 모달 제어)
const flgDetail = ref(false);
const detailProduct = computed(() => store.state.board.detailProduct);
const openDetailModal = (item) => {
  store.commit('board/setDetailProduct', item);
  flgDetail.value = true;
}
const closeDetailModal = () => {
  flgDetail.value = false;
}
</script>

<style scoped>
.bg-modal-black {
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.7);
  position: fixed;
  top: 0;
  left: 0;
}
.bg-modal-white {
  width: 80%;
  max-width: 300px;
  background: white;
  margin: 20px auto;
  padding: 20px;
}
.detailModalAnimation-enter-from {
    opacity: 0;
}
.detailModalAnimation-enter-active {
    transition: 1s ease;
}
.detailModalAnimation-enter-to {
    opacity: 1;
}
.detailModalAnimation-leave-from {
    transform: translateX(0px);
}
.detailModalAnimation-leave-active {
    transition: all 3.5s;
}
.detailModalAnimation-leave-to {
    transform: translateY(4000px);
}
</style>