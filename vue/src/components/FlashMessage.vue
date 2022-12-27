<template>
  <div
    v-if="message || errors.length>0"
  >    
      <p v-if="message" style="color:green">
        {{ message }}
      </p>
      <p 
        v-if="errors.length>0" 
        v-for="error in errors"
        style="color:red"
      >
        {{ error }}
      </p>
  </div>
</template>

<script setup>
import {computed} from 'vue'
import store from '@/store'

const message = computed( () => store.getters['notify/getMessage'] )
const errors = computed( () => store.getters['notify/getErrors'] )

</script>
