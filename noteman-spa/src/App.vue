<template>
  <div id="app">
    <div v-if="userLoggedOut">
      <transition name='fade'>
        <router-view />
      </transition>
    </div>
    <div v-else>
      <navigation />
      <div class="section">
        <div class="container">
          <transition name='fade'>
            <router-view/>
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Navigation from '@/components/Navigation'
import store from '@/store'

export default {
  name: 'app',
  components: {
    Navigation
  },
  computed: {
    userLoggedOut () {
      return !store.state.userIsLoggedIn
    }
  }
}
</script>

<style lang="scss">
@import "~bulma";
html {
  background-color: hsl(0, 0%, 96%);
}
</style>
