import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ArtistComponent from './components/Artist/Artist.vue';

app.component('favorite-artist', ArtistComponent);

app.mount('#appVue');
