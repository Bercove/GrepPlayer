<template>
    <ul class="list-unstyled row iq-box-hover mb-0"> 
        <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box"
            v-for="(album, index) in albums"
            v-bind:key="index">
            <div class="iq-card">
                <div class="iq-card-body p-0">
                    <div class="iq-thumb">
                        <div class="iq-music-overlay"></div>
                        <a href="javascript:;">
                            <img v-bind:src="album.image" class="img-border-radius img-fluid w-100" alt="{{ album.name }}">
                        </a>
                        <div class="overlay-music-icon">
                            <a href="javascript:;">
                                <i class="las la-play-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="feature-list text-center">
                        <h6 class="font-weight-600 mb-0">{{ album.name }}</h6>
                        <p class="mb-0">{{ album.artist }}</p>
                        <button @click="destroy(album.id)" type="button" class="btn btn-outline-primary rounded-pill mb-1" data-toggle="tooltip" title="" data-original-title="Delete Artist">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    data () {
        return {
            albums: [],
            currentUser: window.user,
        }
    },

    http: {
        headers: {
            'X-CSRF-TOKEN': window.csrf
        }
    },

    created() {
        this.get();
    },

    methods: {
        get(){
            axios.get('/dashboard/last-fm/album/favorite')
            .then((res) => {
                console.log(res.data);
                this.albums = res.data;
            })
            .catch((err) => {
                console.log(err);
            });
        },
        
        destroy(albumId){
            axios.post('/dashboard/last-fm/album/favorite/destroy', {
                userId: this.currentUser.id,
                albumId: albumId,
            })
            .then((res) => {
                this.get();
            })
            .catch((err) => {
                console.log(err.res);
            });
        }
    }
}
</script>