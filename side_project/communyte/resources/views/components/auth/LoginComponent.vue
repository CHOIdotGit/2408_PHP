<template>
    <div>
        <p class="form-title">로그인</p>
        <img src="/img/1664526605722.jpg">
        <input v-model="userInfo.account" type="text" name="account" placeholder="아이디">
        <input v-model="userInfo.password" type="password" name="password" placeholder="비밀번호">
        <button @click="$store.dispatch('user/login', userInfo)" class="btn btn-bk">로그인</button>
    </div>
</template>
<script setup>

import { reactive } from 'vue';

const userInfo = reactive({
    account: '',
    password: '',
})
</script>
<style>
    
</style>