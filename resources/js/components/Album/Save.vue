<template>
    <div>
        <button @click="save()" type="button" class="btn btn-outline-primary rounded-pill mb-1"><i class="ri-heart-line"></i></button>
    </div>
</template>

<script>
export default {
    props: [
        'name',
        'artist',
        'image'
    ],

    data () {
        return {
            currentUser: window.user,
        }
    },

    http: {
        headers: {
            'X-CSRF-TOKEN': window.csrf
        }
    },

    methods: {
        save(){
            axios.post('/dashboard/last-fm/album/favorite',
            { 
                userId: this.currentUser.id,
                name: this.name,
                artist: this.artist,
                image: this.image,
            })
            .then((res) => {
                if(res.data.status){
                    console.log("Favorite Album saved successfully");
                }
                else{
                    console.log("Sorry we are unable to save your favorite album");
                }
            })
            .catch((err) => {
                console.log(err.res);
            });
        },
    }
}
</script>