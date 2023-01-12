import axios from 'axios'
import store from '@/store'
import router from '@/router'

const API = axios.create( {
	baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`,
  withCredentials: true,
} )

API.interceptors.request.use( config => {

	config.headers.Authorization = `Bearer ${store.getters['user/getToken']}`
	return config;
	
} )

API.interceptors.response.use(
  (response) => {
    return response
  },
  function (error) {

    console.log(error)
    
    if ( error.response ) {

      let _errors = typeof error.response.data.error !== 'undefined' ? {"error": [error.response.data.error]} : error.response.data.errors

      if( typeof _errors === 'undefined' ) {
        _errors = {"error": ['Server error']} 
      }

      store.commit( {
        type: 'notify/SET_ERRORS',
        errors: _errors
      } )

      if( error.response.status !== 422 ) {
        
        // logout 
        store.commit( 'user/DESTROY_USER' )
        router.push( {name: 'Login'} )

      }
      
    }
    // return Promise.reject(error);
  }
)

export default API