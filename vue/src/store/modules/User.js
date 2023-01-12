const user = {
  namespaced: true,
  state: {
    user: null,
    token: localStorage.getItem( 'TOKEN' )
  },
  getters: {
    getToken: state => state.token,
    getUser: state => state.user,
    getEmailVerifiedAt: state => state.user?.emailVerifiedAt,
  },
  mutations: {
    SET_VERIFIED: ( state, payload ) => {
      const {emailVerifiedAt} = payload
      if( state.user ) {
        state.user.emailVerifiedAt = emailVerifiedAt
      }      
    },
    SET_USER_IF_AUTH: ( state, payload ) => {
      const {user} = payload
      state.user = user
    },
    SET_USER: ( state, payload ) => {
      const {token, user} = payload
      state.token = token
      localStorage.setItem( 'TOKEN', token )
      state.user = user
    },
    DESTROY_USER: state => {
      state.token = null
      localStorage.removeItem( 'TOKEN' )
      state.user = null
    }
  },
  actions: {
    login( {commit} ) {
      console.log('login')
    },
    logout( {commit} ) {
      console.log('logout')
    },
  }
}

export default user

// export const state = {
//   user: null,
//   users: [],
//   meta: null,
//   links: null,
//   loading: false,
//   error: null,
// };

// export const mutations = {
//   SET_USER(state, user) {
//     state.user = user;
//   },
//   SET_USERS(state, users) {
//     state.users = users;
//   },
//   SET_LOADING(state, loading) {
//     state.loading = loading;
//   },
//   SET_MESSAGE(state, message) {
//     state.message = message;
//   },
//   SET_ERROR(state, error) {
//     state.error = error;
//   },
// };

// export const actions = {
//   getUser({ commit }, userId) {
//     commit("SET_LOADING", true);
//     UserService.getUser(userId)
//       .then((response) => {
//         commit("SET_USER", response.data.data);
//         commit("SET_LOADING", false);
//       })
//       .catch((error) => {
//         commit("SET_LOADING", false);
//         commit("SET_ERROR", getError(error));
//       });
//   },
//   getUsers({ commit }) {
//     commit("SET_LOADING", true);
//     UserService.getUsers()
//       .then((response) => {
//         commit("SET_USERS", response.data.data);
//         commit("SET_LOADING", false);
//       })
//       .catch((error) => {
//         commit("SET_LOADING", false);
//         commit("SET_ERROR", getError(error));
//       });
//   },
// };

// export const getters = {
//   user: (state) => {
//     return state.user;
//   },
//   users: (state) => {
//     return state.users;
//   },
//   loading: (state) => {
//     return state.loading;
//   },
//   message: (state) => {
//     return state.message;
//   },
//   error: (state) => {
//     return state.error;
//   },
// };
