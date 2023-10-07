<template>
  <div id="wp-plugin-vue-frontend-app">
    <h2>{{ __('Frontend Vue App', 'wp-plugin-vue') }}</h2>

    <router-link to="/">{{ __('Home', 'wp-plugin-vue') }}</router-link>
    <router-link to="/profile">{{ __('Profile', 'wp-plugin-vue') }}</router-link>

    <router-view />
  </div>
</template>

<script>

export default {
  name: 'App',
  data() {
    return {
    }
  }
}
</script>

<!-- use scoped to make sure component only style -->
<!-- use lang="scss" to write and compiled scss -->
<style lang="scss" scoped>
</style>
