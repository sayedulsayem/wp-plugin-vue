import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router.js'

// to enable javascript string translation
const { __, _x, _n, _nx } = wp.i18n;

const app = createApp(App);

// set string translations method as a global method
app.config.globalProperties.__ = __;
app.config.globalProperties._x= _x;
app.config.globalProperties._n = _n;
app.config.globalProperties._nx = _nx;

app.use(router).mount('#wp-plugin-vue-frontend');
