<template>
    <form @submit.prevent="register">

        <div>
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                v-model="formData.name"
            />
        </div>

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                v-model="formData.email"
            />
        </div>

        <div>
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                v-model="formData.password"
            />
        </div>

        <div>
            <label for="password_confirmation">Password confirmation</label>
            <input
                type="password"
                id="password_confirmation"
                v-model="formData.password_confirmation"
            />
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
        
    </form>

    <!-- <ul v-if="errors.length>0">
        <li
          style="color:red"
          v-for="error in errors">
            {{ error }}
          </li>
    </ul> -->

</template>

<script setup>
    import { ref } from 'vue'
    import Auth from '@/services/Auth'

    const formData = ref( {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
    } )

    const errors = ref( [] )

    const register = () => {

        errors.value = []

        // validation
        if( ! formData.value.name ) errors.value.push( 'Fill in name' )
        if( ! formData.value.email ) errors.value.push( 'Fill in email' )
        if( ! formData.value.password ) errors.value.push( 'Fill in password' )
        if( ! formData.value.password_confirmation ) errors.value.push( 'Confirm your password' )
        if( 
            formData.value.password && 
            formData.value.password_confirmation &&
            formData.value.password !== formData.value.password_confirmation
        ) {
            errors.value.push( 'Password and Password confirmation do NOT match' )
        }

        Auth.register( formData.value )

    }

</script>