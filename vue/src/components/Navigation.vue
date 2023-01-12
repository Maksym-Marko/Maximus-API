<template>
    <ul>

        <li><router-link :to="{name: 'Home'}">Home</router-link></li>
        <li><router-link :to="{name: 'About'}">About</router-link></li>
        <li><router-link :to="{name: 'Dashboard'}">Dashboard</router-link></li>
        <li><router-link :to="{name: 'VerifyEmailCheck'}">VerifyEmailCheck</router-link></li>
        <li><router-link :to="{name: 'Register'}">Register</router-link></li>
        <li><router-link :to="{name: 'Login'}">Login</router-link></li>
        <li><button type="button" @click="logout">Logout</button></li>

    </ul>

</template>

<script setup>
    import Auth from '@/services/Auth'

    const logout = () => {
        Auth.logout()
    }
</script>