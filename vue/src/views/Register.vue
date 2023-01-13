<template>
  <div>

    <h2>Register</h2>

    <RegistrationForm />

    <p>
      <router-link :to="{name:'Login'}">
        Login now
      </router-link>
    </p>

  </div>
</template>

<script setup>
  import RegistrationForm from '@/components/RegistrationForm.vue'

  
</script>
