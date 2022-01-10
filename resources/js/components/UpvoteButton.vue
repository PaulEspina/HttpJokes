<template>
    <div>
        <button class="btn" type="submit" @click="upvote">
            <img v-if="up" src="/images/upvoted.png" width="16px" height="16px">
            <img v-else src="/images/upvote.png" width="16px" height="16px">
        </button>
        {{ count }}
    </div>
</template>
<script>
    export default
    {
        props: ['joke_id', 'count', 'up'],

        mounted()
        {
            console.log('Component mounted.');
            this.$root.$on("downvote", msg =>
            {
                this.count = msg;
                this.up = false;
            })
        },

        methods:
        {
            upvote()
            {
                axios.post('/votes/up', { joke_id: this.joke_id })
                    .then(response =>
                    {
                        this.count = response.data['upCount'];
                        this.$root.$emit("upvote", response.data['downCount']);
                    })
                this.up = !this.up;
            },
        }
    }
</script>
