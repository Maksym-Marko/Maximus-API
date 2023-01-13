<template>
    <form
      @submit.prevent="forgotPassword"
    >
        <input
            type="email"
            autocomplete="email"
            v-model="formData.email"
            :class="[errors.length>0 && !formData.email ? 'empty-field' : '']"
        />
        <br>
        <button type="submit">EMAIL PASSWORD RESET LINK</button>
    </form>
</template>

<script setup>
    import { ref } from 'vue'
    import Auth from '@/services/Auth'

    const formData = ref( {
        email: null
    } )

    const errors = ref( [] )

    const forgotPassword = () => {

        errors.value = []

        if( ! formData.value.email ) {
            errors.value.push( 'Fill in email' )
            return
        }

        Auth.forgotPasswordSend( {
            email: formData.value.email
        } )

    }

</script>