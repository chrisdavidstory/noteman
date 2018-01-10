<template>
  <div class='container'>
    <note-list />
  </div>
</template>

<script>
import NoteList from '@/components/NoteList'

export default {
  name: 'dashboard',
  data () {
    return {
      notes: []
    }
  },
  components: {
    NoteList
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>