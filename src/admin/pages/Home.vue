<template>
  <div class="home">
    <span>{{ msg }}</span>
    <div></div>
  </div>
</template>

<script>
export default {
  name: "Home",

  data() {
    return {
      msg: this.__('Welcome to Your Vue.js Admin App', 'wp-plugin-vue'),
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
