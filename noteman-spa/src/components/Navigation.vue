<template>
  <div>
    <nav class='navbar is-dark' role='navigation' aria-label='main navigation'>
      <div class='navbar-brand'>
        <div class='navbar-item'>
          <router-link :to="{ name: 'dashboard' }" class='title is-4 has-text-white'><span class='icon has-text-primary'><font-awesome-icon icon='book' /></span> NoteMan</router-link>
        </div>
      </div>
      <div class='navbar-menu'>
        <div class='navbar-start'>
        </div>
        <div class='navbar-end'>
          <div class='field is-grouped'>
            <div class='navbar-item'>
              <button class="button is-primary" @click="showNewNoteModal = true"><font-awesome-icon icon='plus' /> New Note</button>
            </div>
            <div class='navbar-item'>
              <router-link :to="{ name: 'logout' }" class='button'>Logout</router-link>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <new-note-modal v-if="showNewNoteModal" @close="showNewNoteModal = false" @addNewNote="showNewNoteModal = false"/>
  </div>
</template>

<script>
import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
import '@fortawesome/fontawesome-free-solid'
import NewNoteModal from '@/components/NewNoteModal'

export default {
  name: 'navigation',
  props: [ 'user' ],
  data () {
    return {
      showNewNoteModal: false
    }
  },
  methods: {
    addNoteToList (value) {
      this.$emit('addNewNote', value)
    }
  },
  components: {
    FontAwesomeIcon,
    NewNoteModal
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang='sass' scoped>

</style>
