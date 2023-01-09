<template>
  
  <div
    v-if="messages.length>0 || (errors && Object.keys( errors ).length>0)"
    :style="{
      position: 'fixed',
      right: '20px',
      bottom: '20px'      
    }"
  >  

      <p 
        v-if="messages"
        v-for="message in messages"
        :style="{
          color: 'green',
          border: '2px solid green',
          borderRadius: '8px',
          padding: '10px'
        }"
      >
        {{ message }}
      </p>

      <p 
        v-if="Object.keys( errors ).length>0" 
        v-for="error in errors"
        :style="{
          color: 'red',
          border: '2px solid red',
          borderRadius: '8px',
          padding: '10px'
        }"
      >
        {{ error[0] }}
      </p>
  </div>
</template>

<script setup>
import {computed} from 'vue'
import store from '@/store'

const messages = computed( () => store.getters['notify/getMessages'] )
const errors = computed( () => store.getters['notify/getErrors'] )

</script>
