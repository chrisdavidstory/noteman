<template>
  <div class="card" v-if='!editingMode'>
    <div class="card-content">
      <div class="media">
        <div class="media-left">
          <figure class="image is-48x48">
            <v-gravatar email="userEmail" />
          </figure>
        </div>
        <div class="media-content">
          <p class="title is-4">{{ title }}</p>
          <p class="subtitle is-7">Created by {{ userName }}, on {{ updatedAt | moment }}</p>
        </div>
      </div>
      <hr />
      <p>
        {{ body }}
      </p>
    </div>
    
    <div class="card-level level">
      <div class="level-left">
        <button class='button is-info is-small level-item' @click='editingMode=true'>
          <span class='icon'><font-awesome-icon icon='edit' size='xs'/></span>
          <span>Edit</span>
        </button>
      </div>
      <div class="level-right">
        <button class='button is-primary is-small level-item' @click='remove'>
          <span class='icon'><font-awesome-icon icon='trash-alt' size='xs'/></span>
          <span>Delete</span>
        </button>
      </div>
    </div>
    
  </div>
  <div class="card" v-else>
    <form @submit.prevent="save">
      <div class="card-content">
        <div class="field">
          <div class="control">
            <input class="input" type="text" v-model="title" />
          </div>
        </div>
        <div class="field">
          <div class="control">
            <textarea class="textarea" placeholder="Textarea" v-model="body"></textarea>
          </div>
        </div>
      </div>
      <footer class="card-footer">
        <p class="card-footer-item">
          <button class='button is-info'>
            <span class='icon'><font-awesome-icon icon='save' size='xs'/></span>
            <span>Save</span>
          </button>
        </p>
        <p class="card-footer-item">
          <button class='button is-primary' @click='remove'>
            <span class='icon'><font-awesome-icon icon='trash-alt' size='xs'/></span>
            <span>Delete</span>
          </button>
        </p>
      </footer>
    </form>
  </div> 
</template>

<script>
import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
import '@fortawesome/fontawesome-free-solid'
import store from '@/store'
import moment from 'moment'
import Gravatar from 'vue-gravatar'
import axios from 'axios'

export default {
  name: 'note',
  props: [ 'initialNote', 'initialTitle', 'initialBody' ],
  data () {
    return {
      editingMode: false,
      'note': this.initialNote,
      'body': this.initialNote.body,
      'title': this.initialNote.title
    }
  },
  computed: {
    userEmail () {
      return this.note.user.email
    },
    avatarAlt () {
      return `${this.note.user.name}'s avatar image`
    },
    updatedAt () {
      return this.note.updatedAt
    },
    userName () {
      return this.note.user.name
    }
  },
  methods: {
    save () {
      axios.patch('http://localhost:9000/notes/' + this.note.id, {
        title: this.title,
        body: this.body,
        api_key: localStorage.getItem('apiKey')
      }).then(() => {
        this.editingMode = false
        store.commit('UPDATE_NOTE', { id: this.note.id, title: this.title, body: this.body })
      }).catch(() => {
      })
    },
    remove () {
      axios.delete('http://localhost:9000/notes/' + this.note.id + '?api_key=' + localStorage.getItem('apiKey'))
        .then(() => {
          store.commit('REMOVE_NOTE_FROM_LIST', this.note)
        }).catch()
    },
    cancel () {
      this.editingMode = false
    }
  },
  filters: {
    moment: function (date) {
      return moment(date, moment().ISO_8601, true).format('ddd MMM Do YY [at] HH:mm')
    }
  },
  components: {
    FontAwesomeIcon,
    'v-gravatar': Gravatar
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.card {
    min-height: 250px;
    display:flex;
    flex-direction: column;
    height: 100%;
}
.card-level {
    margin-top: auto;
    button {
      margin: 1rem 1.25rem 1rem 1.25rem
    }
}
</style>
