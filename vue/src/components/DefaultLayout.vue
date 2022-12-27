<template>

    <div class="DefaultLayout">
        <Navigation />
        <br>
        <router-view />
    </div>

    <FlashMessage />
    
</template>

<script setup>
    import Navigation from '@/components/Navigation.vue'
    import FlashMessage from '@/components/FlashMessage.vue'    
</script>