<template>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="post" action="/login/check">
                <input type="hidden" name="_token" :value="csrf">
                <input name="email" type="email" placeholder="email"/>
                <input name="password" type="password" placeholder="password"/>
                <button type="submit">login</button>
            </form>
        </div>
    </div>
</template>
<style src="../../../public/css/login.css"></style>
<script>
    export default {
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    }
</script>