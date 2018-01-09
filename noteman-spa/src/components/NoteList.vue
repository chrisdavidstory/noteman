<template>
  <div class='columns is-multiline' v-if='notes.length > 0'>
    <div class='column is-one-third' v-for='note in notes' :key='note.id'>
      <note :initial-note='note' :title='note.title' :body='note.body' />
    </div>
  </div>
  <div v-else>
    <div class='box is-centered'>
      <p>Uh oh...looks like you don't have any notes saved yet. Hit that big turquise button at the top and get started!</p>
    </div>
  </div>
</template>

<script>
import Note from '@/components/Note'
import store from '@/store'
import axios from 'axios'
export default {
  name: 'note-list',
  created () {
    let key = localStorage.getItem('apiKey')
    axios.get('http://localhost:9000/notes?api_key=' + key)
      .then((response) => {
        response.data.data.forEach(element => {
          store.commit('ADD_NOTE_TO_LIST', element)
        })
      })
      .catch()
  },
  data () {
    return {
    }
  },
  computed: {
    notes () {
      return store.state.notes
    }
  },
  components: {
    Note
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
