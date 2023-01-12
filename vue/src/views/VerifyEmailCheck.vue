<template>

    Verification ...

    <h2
        v-if="$route.params.id === '' || $route.params.hash === ''"
    >Something went wrong</h2>
    
</template>

<script setup>
    import { onMounted, computed } from 'vue'
    import { useRoute, useRouter } from 'vue-router'
    import store from '@/store'
    import Auth from '@/services/Auth'

    const router = useRouter()
    const route = useRoute()

    const userVerified = computed( () => store.getters['user/getEmailVerifiedAt'] )

    const verification = () => {

        if( 
            typeof route.query.id === 'undefined' ||
            typeof route.query.hash === 'undefined'
        ) {


            router.push( { name: 'notFound' } )

            return

        }
        
        if( userVerified.value ) {

            router.push( { name: 'Dashboard' } )

            return

        }

        if( ! userVerified.value ) {

            Auth.emailVerificationCheck( {
                id: route.query.id,
                hash: route.query.hash
            } )

        }

    }

    onMounted( () => {

        verification()

    } )

</script>