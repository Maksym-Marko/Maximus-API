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
    
    if ( error.response ) {

      if(error.response.status === 422) {
        
        store.commit( {
          type: 'notify/SET_ERRORS',
          errors: ['The Provided credentials are not correct']
        } )

      } else {

        store.commit( {
          type: 'notify/SET_ERRORS',
          errors: [error.response.data.message]
        } )

        // logout 
        store.commit( 'user/DESTROY_USER' )
        router.push( {name: 'Login'} )

      }
      
    }
    // return Promise.reject(error);
  }
)

export default API