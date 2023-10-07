<template>
  <div id="wp-plugin-vue-admin-app">
    <h1>{{ __('WP Plugin Vue Dashboard', 'wp-plugin-vue') }}</h1>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: "App",
  data() {
    return {
    };
  },
};
</script>

<!-- use scoped to make sure component only style -->
<!-- use lang="scss" to write and compiled scss -->
<style lang="scss" scoped>
</style>
