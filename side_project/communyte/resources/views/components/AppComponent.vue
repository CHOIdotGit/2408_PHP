<template>
    <header>
        <div class="title">
            <h1 @click="$router.replace('/boards')">community</h1>
            <img src="/img/1664526605722.jpg" class="logo-img">
            <div v-if="!$store.state.user.authFlg" class="sign">
                <router-link to="/login">
                    <button class="sign-in btn bg-bk">SIGN IN</button>
                </router-link>
                <router-link to="/registration">
                    <button class="sign-up btn bg-nv">SIGN UP</button>
                </router-link>
            </div>
            <div v-else class="logout">
                <button @click="$store.dispatch('user/logout')" class="btn-img">
                    <img src="img/4400629.png" class="exit">
                </button>
            </div>
        </div>
    </header>
    <main>
        <UserInfoComponent v-if="$store.state.user.authFlg" />
        <div>
            <router-view></router-view>
        </div>
    </main>
    <footer>
        <p>© 2024. Nia All rights reserved.</p>
    </footer>
</template>

<script setup>

import UserInfoComponent from './user/UserInfoComponent.vue';

</script>

<style scoped>
    
    @import url('../../css/common.css');
</style>