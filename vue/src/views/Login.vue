<template>
  <div>

    <h2>Login</h2>

    <LoginForm />

    <p>
      <router-link :to="{name: 'ForgotPassword'}">
        Forgot your password?
      </router-link>
    </p>

    <p>
      <router-link :to="{name:'Register'}">
        Register for an account
      </router-link>
    </p>
    
  </div>
</template>

<script setup>
  import LoginForm from "@/components/LoginForm.vue";

</script>
