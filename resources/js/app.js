import './bootstrap';
import { createApp } from 'vue';
const app = createApp({});

import defaultcomp from './components/defaultC.vue';
app.component('defaultcomp', defaultcomp);
app.mount('#app');
