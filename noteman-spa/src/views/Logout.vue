<template>
</template>

<script>
import router from '@/router'
import store from '@/store'

export default {
  name: 'logout',
  mounted () {
    localStorage.removeItem('apiKey')
    store.commit('LOGOUT_USER')
    router.push({ name: 'login' })
  }
}
</script>
