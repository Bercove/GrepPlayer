<template>
    <ul class="list-unstyled row iq-box-hover mb-0"> 
        <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box"
            v-for="(artist, index) in artists"
            v-bind:key="index">
            <div class="iq-card">
                <div class="iq-card-body p-0">
                    <!-- <div class="iq-thumb">
                        <div class="iq-music-overlay"></div>
                        <a href="javascript:;">
                            <img src="{{ $image['#text'] }}" class="img-border-radius img-fluid w-100" alt="{{ $image['size'] }}">
                        </a>
                        <div class="overlay-music-icon">
                            <a href="javascript:;">
                                <i class="las la-play-circle"></i>
                            </a>
                        </div>
                    </div> -->
                    <div class="feature-list text-center">
                        <p class="mb-0">{{ artist.name }}</p>
                        <button @click="destroy(artist.id)" type="button" class="btn btn-outline-primary rounded-pill mb-1" data-toggle="tooltip" title="" data-original-title="Delete Artist">
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
            artists: [],
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
            axios.get('/dashboard/last-fm/artist/favorite')
            .then((res) => {
                this.artists = res.data;
            })
            .catch((err) => {
                console.log(err.res);
            });
        },
        
        destroy(artistId){
            axios.post('/dashboard/last-fm/artist/favorite/destroy', {
                userId: this.currentUser.id,
                artistId: artistId,
            })
            .then((res) => {
                this.get();
            })
            .catch((err) => {
                console.log(err);
            });
        }
    }
}
</script>