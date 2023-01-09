import router from '@/router'
import API from '@/services/API'
import store from '@/store'

const Auth = {
    register( payload ) {

        if( store.getters['user/getToken'] ) return

        const { name, email, password, password_confirmation } = payload

        API.post( '/register', {
            name,
            email,
            password,
            password_confirmation
        } ).then( res => {

            if( res && res.status === 200 ) {

                store.commit( {
                    type: 'user/SET_USER',
                    token: res.data.token,
                    user: res.data.user
                } )

                store.commit( {
                    type: 'notify/SET_MESSAGES',
                    messages: ['Registration is successful!']
                } )

                router.push( {name: 'Dashboard'} )

            }

        } )

    },
    login( payload ) {

        if( store.getters['user/getToken'] ) return

        const { email, password } = payload

        API.post( '/login', {
            email,
            password
        } ).then( res => {

            if( res && res.status === 200 ) {

                store.commit( {
                    type: 'user/SET_USER',
                    token: res.data.token,
                    user: res.data.user
                } )

                store.commit( {
                    type: 'notify/SET_MESSAGES',
                    messages: ['Login is successful!']
                } )

                router.push( {name: 'Dashboard'} )

            }

        } )
        
    },
    logout() {

        if( ! store.getters['user/getToken'] ) return
       
        API.post( '/logout' )
            .then( res => {

                if(res.status === 200 ) {

                    store.commit( 'user/DESTROY_USER' )
                    router.push( {name: 'Login'} )

                }

            } )

    },
    getUser() {

        API.get( '/user' )
            .then( res => {

                if(res.status === 200 ) {

                    store.commit( {
                        type: 'user/SET_USER_IF_AUTH',
                        user: res.data
                    } )

                }

            } )

    }
}

export default Auth