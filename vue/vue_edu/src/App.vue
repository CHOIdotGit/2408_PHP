<template>
  <!-- Component Event -->
  <p>부모쪽 cnt : {{ cnt }}</p>
  <EventComponent 
    :cnt = "cnt"
    @eventAddCnt = "addCnt"
    @eventAddCntParam = "addCntParam"
    @eventResetCnt = "resetCnt"
  />
  <hr>
  <!-- Props -->
   <!-- 읽기전용, readOnly -->
   <ChildComponent
    :data = "data"
    :count = "cnt"
   >
    <h3>부모쪽에서 작성한 것들</h3>
    <p>Aaaaaa</p>
   </ChildComponent>
  <hr>
  <!-- 자식 컴포넌트 호출 -->
   <BoardComponent />
   <hr>
<!-- HTML 영역 -->
  <!-- 리스트 랜더링 -->
  <!-- v-for -->
  <!-- 단순 반복 -->
  <div v-for="val in 5" :key="val">
    <p>{{ val }}</p>
  </div>

  <!-- 구구단 -->
  <!-- <div v-for="i in 8" :key="i++">
    <h2>**** {{ i }}단 ****</h2>
    <div v-for="j in 9" :key="j">
      <p>{{ i }} X {{ j }} = {{ i * j }}</p>
    </div>
  </div>
  위의 방식은 Vue에서 좋은 방법이 아니다 - key 값을 건드리기 때문 
  <div v-for="i in 8" :key="i">
    <h2>**** {{ i+1 }}단 ****</h2>
    <div v-for="j in 9" :key="j">
      <p>{{ i+1 }} X {{ j }} = {{ (i+1) * j }}</p>
    </div>
  </div> -->

  <div v-for="(item, key) in data" :key="item">
    <p>{{ `${key+1}번째 ${item.name} - ${item.age}살 - ${item.gender}` }}</p>
  </div>  
  <button @click="data.pop()">둘리 삭제</button>


  <!-- 조건부 랜더링 v-if -->
  <div>
    <h2 v-if="cnt === 7">럭키세븐</h2>
    <h2 v-else-if="cnt > 5">5보다 큽니다.</h2>
    <h2 v-else-if="cnt < 0">음수 입니다.</h2>
    <h2 v-else>0이상 5이하 입니다.</h2>
  </div>
  <!-- v-show -->
   <h2 v-show="flgShow">브이쇼</h2>
   <button @click="flgShow = !flgShow">브이쇼 토글</button>

  <h1>{{ cnt }}</h1>
  <div class="counter">
    <button @click="addCnt">증가</button>
    <button @click="disCnt">감소</button>
  </div>
  <hr>
  <div class="info">
    <h2>이름 : {{ userInfo.name }}</h2>
    <h2 :class="ageBlue">나이 : {{ userInfo.age }}</h2>
    <h2>성별 : {{ userInfo.gender }}</h2>
  </div>
  <div class="change">
    <button @click="changeName">이름 변경</button>
    <button @click="changeAgeBlue">나이 색상 변경</button>
  </div>
  <br>
  <div class="change">
    <input type="text" v-model="transgender">
    <button @click="userInfo.gender = transgender">성별 변경</button>
  </div>
  <p>{{ transgender }}</p>
  
</template>

<script setup>
// JS 영역
import BoardComponent from './components/BoardComponent.vue';
import ChildComponent from './components/ChildComponent.vue';
import EventComponent from './components/EventComponent.vue';
import { reactive, ref } from 'vue';
const data = reactive([
    {name: '강지', age:31, gender: '감자'}
    ,{name: '아야츠노 유니', age:5, gender: '유니콘'}
    ,{name: '아이네', age:31, gender: '여자'}
  ]);
const flgShow = ref(true);
const transgender = ref('');

const ageBlue = ref('');
function changeAgeBlue() {
  ageBlue.value = 'blue';
}

// ------------- ref -------------
const cnt = ref(0); // 데이터 바인딩으로 사용하려면 이렇게 사용해야함, ref객체
// ------------- reactive -------------
const userInfo = reactive({
  name: '홍길동'
  ,age: 20
  ,gender: 'undefined'
});
function changeName() {
  userInfo.name = '전우치';
}
// 함수 표현식은 function addCnt() {} 를 사용하면 된다
const addCnt = () => {
  cnt.value++;
}
function addCntParam(num) {
  cnt.value += num;
}
// 함수 표현식은 function disCnt() {} 를 사용하면 된다
const disCnt = () => {
  cnt.value--;
}
function resetCnt() {
  cnt.value = 0;
}
</script>

<style>
/* CSS 영역 */
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.counter, .change {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1rem;
}

.blue {
  color : blue;
}
</style>
