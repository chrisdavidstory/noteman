import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  userIsLoggedIn: !!localStorage.getItem('apiKey'),
  notes: []
}

const mutations = {
  ADD_NOTE_TO_LIST (state, note) {
    state.notes.push(note)
  },

  GET_NOTES (state) {
    return state.notes
  },

  UPDATE_NOTE (state, note) {
    state.notes[note.id - 1]['title'] = note.title
    state.notes[note.id - 1]['body'] = note.body
  },

  REMOVE_NOTE_FROM_LIST (state, note) {
    state.notes = state.notes.filter(el => { return el.id !== note.id })
  },

  LOGIN_USER (state) {
    state.userIsLoggedIn = true
  },

  LOGOUT_USER (state) {
    state.userIsLoggedIn = false
  }
}

export default new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  state,
  mutations
})
