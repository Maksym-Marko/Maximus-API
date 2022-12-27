import { createRouter, createWebHistory } from 'vue-router'
import store from '@/store'
import Auth from '@/services/Auth'

const routes = [
  {
    path: '/',
    component: () => import( '@/components/DefaultLayout.vue' ),
    children: [
      {
        path: '/',
        name: 'Home',
        component: () => import( '@/views/Home.vue' )
      },
      {
        path: '/about',
        name: 'About',
        component: () => import( '@/views/About.vue' )
      },      
    ]
  },

  // Auth area
  {
    path: '/auth',
    component: () => import( '@/components/DefaultLayout.vue' ),
    meta: {
      requiresGuest: true,
    },
    children: [
      {
        path: '/login',
        name: 'Login',
        component: () => import( '@/views/Login.vue' )
      },
      {
        path: '/register',
        name: 'Register',
        component: () => import( '@/views/Register.vue' )
      },      
    ]
  },

  // Dashboard area
  {
    path: '/dashboard',
    component: () => import( '@/components/DefaultLayout.vue' ),
    meta: {
      requiresAuth: true,
    },
    children: [
      {
        path: '/dashboard',
        name: 'Dashboard',
        component: () =>
          import( '@/views/Dashboard.vue' ),
      },
      {
        path: '/user',
        name: 'User',
        meta: { requiresAuth: true },
        component: () => import('@/views/User.vue'),
      },
    ]
  }
    

    // {
    //   path: "/dashboard",
    //   name: "dashboard",
    //   meta: { requiresAuth: true },
    //   component: () =>
    //     import(/* webpackChunkName: "dashboard" */ "@/views/Dashboard.vue"),
    // },

    // {
    //   path: "/users",
    //   name: "users",
    //   meta: { requiresAuth: true },
    //   component: () => import(/* webpackChunkName: "users" */ "@/views/Users.vue"),
    //   beforeEnter: (to, from, next) => {
    //     if (store.getters["auth/isAdmin"]) next();
    //     else next(false);
    //   },
    // },
    // {
    //   path: "/login",
    //   name: "login",
    //   component: () => import(/* webpackChunkName: "login" */ "@/views/Login.vue"),
    // },
    // {
    //   path: "/register",
    //   name: "register",
    //   component: () =>
    //     import(/* webpackChunkName: "register" */ "@/views/Register.vue"),
    // },
    // {
    //   path: "/reset-password",
    //   name: "ResetPassword",
    //   component: () =>
    //     import(/* webpackChunkName: "reset-password" */ "@/views/ResetPassword.vue"),
    // },
    // {
    //   path: "/forgot-password",
    //   name: "ForgotPassword",
    //   component: () =>
    //     import(
    //       /* webpackChunkName: "forgot-password" */ "@/views/ForgotPassword.vue"
    //     ),
    // }
]

const router = createRouter( {
  history: createWebHistory(),
  routes
} )

router.beforeEach( (to, from, next) => {

  const token = store.getters['user/getToken']
  const user = store.getters['user/getUser']
  const reqAuth = to.meta.requiresAuth
  const reqGuest = to.meta.requiresGuest

  if (reqAuth && ! token) {

    next( { name: 'Login' } )

  } else if( token && reqGuest ) {    

    next( { name: 'Dashboard' } )

  }
  else {

    next()
    
  }

  // Get user data if auth
  if( token && ! user ) Auth.getUser()

} )

export default router