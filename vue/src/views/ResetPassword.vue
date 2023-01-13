<template>
    <h2>Reset Password</h2>
    <form
      @submit.prevent="resetPassword"
    >
      <div>
        <label for="email">Your account Email</label>
        <input
          type="email"
          id="email"
          v-model="formData.email"
          :class="[errors.length>0 && !formData.email ? 'empty-field' : '']"
        />
      </div>
      <div>
        <label for="password">New Password</label>
        <input
          type="password"
          id="password"
          v-model="formData.password"
          :class="[errors.length>0 && !formData.password ? 'empty-field' : '']"
        />
      </div>
      <div>
        <label for="password-confirm"
          >Confirm Password</label
        >
        <input
          type="password"
          id="password-confirm"
          v-model="formData.password_confirmation"
          :class="[errors.length>0 && !formData.password_confirmation ? 'empty-field' : '']"
        />
      </div>
      <button type="submit">Reset Password</button>
    </form>
</template>

<script setup>
  import { onMounted, ref } from 'vue'
  import { useRoute, useRouter } from 'vue-router'
  import store from '@/store'
  import Auth from '@/services/Auth'

  const router = useRouter()
  const route = useRoute()

  const formData = ref( {
    email: null,
    password: null,
    password_confirmation: null
  } )

  const errors = ref( [] )

  const resetPassword = () => {

    if( ! formData.value.email ) errors.value.push( 'Fill in email' )
    if( ! formData.value.password ) errors.value.push( 'Fill in password' )
    if( ! formData.value.password_confirmation ) errors.value.push( 'Confirm your password' )

    if( ! formData.value.email || ! formData.value.password || ! formData.value.password_confirmation ) return

    Auth.forgotPasswordCheck( {
      email: formData.value.email,
      password: formData.value.password,
      password_confirmation: formData.value.password_confirmation,
      token: route.query.token,
    } )
    
  }

  onMounted( () => {

    if( typeof route.query.token === 'undefined' ) {

      router.push( { name: 'notFound' } )

    }

  } )

</script>
