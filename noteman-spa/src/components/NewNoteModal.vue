<template>
  <div>
    <div class="modal is-active">
      <div class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <form @submit.prevent="save">
            <div class="field">
              <div class="control">
                <input class="input" type="text" v-model="title" placeholder="Title of note" required />
              </div>
            </div>
            <div class="field">
              <div class="control">
                <textarea class="textarea" v-model="body" placeholder="Body of note" required></textarea>
              </div>
            </div>
            
            <div class="level">
              <div class="level-left"></div>
              <div class="level-right">
                <button class='button is-info level-item'>
                  <span class='icon'><font-awesome-icon icon='plus' size='xs'/></span>
                  <span>Create Note</span>
                </button>
              </div>
            </div>
          </form>
        </div> 
      </div>
     <button class="modal-close is-large" @click="$emit('close')" aria-label="close"></button>
    </div>
  </div>
</template>

<script>
import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
import '@fortawesome/fontawesome-free-solid'
import store from '@/store'
import axios from 'axios'

export default {
  name: 'new-note-modal',
  data () {
    return {
      showNewNoteModal: false,
      title: '',
      body: ''
    }
  },
  methods: {
    save () {
      axios.post('http://localhost:9000/notes', {
        title: this.title,
        body: this.body,
        api_key: localStorage.getItem('apiKey')
      }).then((response) => {
        store.commit('ADD_NOTE_TO_LIST', response.data.data)
        this.$emit('addNewNote')
      }).catch(() => {
      })
    }
  },
  components: {
    FontAwesomeIcon
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang='scss' scoped>
    .card-level {
        margin-top: auto;
        button {
        margin: 1rem 1.25rem 1rem 1.25rem
        }
    }
</style>
