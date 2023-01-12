import router from '@/router'
import API from '@/services/API'
import store from '@/store'
import emailVerification from '@/services/emailVerification.js'

const Auth = {
    emailVerificationCheck( payload ) {

        const { id, hash } = payload

        API.post( '/send-email-verification-check', {
            id,
            hash
        } )
            .then( res => {

                if(res.data?.message === 'success') {

                    store.commit( {
                        type: 'notify/SET_MESSAGES',
                        message: 'Your email has been verified successfully!'
                    } )

                    store.commit( {
                        type: 'user/SET_VERIFIED' ,
                        emailVerifiedAt: res.data.verified_at
                    } )

                    router.push( {name: 'Dashboard'} )

                } else {

                    router.push( {name: 'VerifyEmail'} )

                }

            } )

    },
    emailVerificationSend() {

        if( import.meta.env.VITE_EMAIL_VERIFICATION !== 'true' ) return

        API.post( '/send-email-verification-url', {
            verificationUrl: import.meta.env.VITE_EMAIL_VERIFICATION_BASE_URL
        } )
            .then( res => {

                if(res.data === 'success') {

                    store.commit( {
                        type: 'notify/SET_MESSAGES',
                        message: 'Verification email sent successfully!'
                    } )

                }

                if(res.data === 'verified') {
                    router.go()
                }

            } )
    },
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
                    message: 'Registration is successful!'
                } )

                // Send Verification email
                this.emailVerificationSend()

                // redirect to verification email page
                router.push( {name: 'VerifyEmail'} )

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
                    message: 'Login is successful!'
                } )

                if( emailVerification() ) {

                    router.push( {name: 'Dashboard'} )

                } else {

                    router.push( {name: 'VerifyEmail'} )

                }        

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

        return new Promise( ( resolve, reject ) => {

            API.get( '/user' )
                .then( res => {

                    if(res.status === 200 ) {

                        store.commit( {
                            type: 'user/SET_USER_IF_AUTH',
                            user: res.data.data
                        } )

                        resolve()

                    }

                } )

        } )

    }
}

export default Auth