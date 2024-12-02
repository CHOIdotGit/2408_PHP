<template>
    <header>
        <div class="title">
            <h1>community</h1>
            <img src="/img/1664526605722.jpg" class="logo-img">
            <div class="sign">
                <button class="sign-in btn bg-bk">SIGN IN</button>
                <button class="sign-up btn bg-nv">SIGN UP</button>
            </div>
            <div class="logout">
                <button class="btn-img">
                    <img src="img/4400629.png" class="exit">
                </button>
            </div>
        </div>
    </header>
    <main>
        <UserInfoComponent />
        <BoardListComponent />
    </main>
    <footer>
        <p>© 2024. Nia All rights reserved.</p>
    </footer>
</template>

<script setup>

import UserInfoComponent from './user/UserInfoComponent.vue';
import BoardListComponent from './board/BoardListComponent.vue';

</script>

<style scoped>
    
    @import url('../../css/common.css');
</style>