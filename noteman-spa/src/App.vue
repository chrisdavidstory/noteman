<template>
  <div id="app">
    <div v-if="isLoginPage">
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
// import store from '@/store'
export default {
  name: 'app',
  components: {
    Navigation
  },
  computed: {
    isLoginPage () {
      return this.$route.name === 'login'
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
