<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- <h2>{{ count }}</h2>
  <div class="btn">
    <button @click="store.commit('board/addCount')">증가</button>
    <button @click="store.commit('board/disCount')">감소</button>
  </div> -->

  <BoardListComponent />

  
  

</template>

<script setup>
import BoardListComponent from './components/BoardListComponent.vue';
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.btn{
  display: flex;
  justify-content: center;
  gap: 1rem;
}
</style>
