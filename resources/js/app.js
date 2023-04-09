import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import SaveFavoriteArtistComponent from './components/Artist/Save.vue';
import GetFavoriteArtistComponent from './components/Artist/Get.vue';
import SaveFavoriteAlbumComponent from './components/Album/Save.vue';
import GetFavoriteAlbumComponent from './components/Album/Get.vue';

app.component('save-favorite-artist', SaveFavoriteArtistComponent);
app.component('get-favorite-artist', GetFavoriteArtistComponent);
app.component('save-favorite-album', SaveFavoriteAlbumComponent);
app.component('get-favorite-album', GetFavoriteAlbumComponent);

app.mount('#appVue');
