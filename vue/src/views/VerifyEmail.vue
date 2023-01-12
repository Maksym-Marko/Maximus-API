<template>
    <h1>Verify email</h1>

    <p>
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </p>

    <button @click.prevent="resendVerificationEmail">Resend Verification Email</button>

</template>

<script setup>
    import { onMounted, computed } from 'vue'
    import { useRouter } from 'vue-router'
    import Auth from '@/services/Auth'
    import store from '@/store'

    const router = useRouter()

    const userVerified = computed( () => store.getters['user/getEmailVerifiedAt'] )

    const resendVerificationEmail = () => {

        Auth.emailVerificationSend()
        
    }

    const checkUser = () => {

        if( userVerified.value ) {

            router.push( { name: 'Dashboard' } )

            return

        }

    }

    onMounted( () => {

        checkUser()

    } )

</script>