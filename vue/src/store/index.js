import { createStore } from 'vuex'
import user from "@/store/modules/User"
import notify from "@/store/modules/Notify"

const store = createStore( {    
    modules: {
        user,
        notify
    }
} )

export default store