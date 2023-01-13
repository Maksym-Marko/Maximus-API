<template>

  <form @submit.prevent="login">

    <input 
      type="email"
      v-model="formData.email"
      :class="[errors.length>0 && !formData.email ? 'empty-field' : '']"
    />

    <input 
      type="password"
      v-model="formData.password"
      :class="[errors.length>0 && !formData.password ? 'empty-field' : '']"
    />
    
    <div>

      <button type="submit">Login</button>

    </div>

  </form>

</template>

<script setup>
  import { ref } from 'vue'
  import Auth from '@/services/Auth'

  const formData = ref( {
    email: null,
    password: null
  } )

  const errors = ref( [] )

  const login = () => {

    errors.value = []

    if( ! formData.value.email ) errors.value.push( 'Fill in email' )
    if( ! formData.value.password ) errors.value.push( 'Fill in password' )

    if( ! formData.value.email || ! formData.value.password ) return

    Auth.login( formData.value )

  }

</script>