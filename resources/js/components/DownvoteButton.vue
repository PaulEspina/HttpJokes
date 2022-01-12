<template>
    <div>
        <button class="btn" type="submit" @click="downvote">
            <img v-if="down" src="/images/downvoted.png" width="16px" height="16px">
            <img v-else src="/images/downvote.png" width="16px" height="16px">
        </button>
        {{ count }}
    </div>
</template>
<script>
    export default
    {
        props: ['joke_id', 'count', 'down'],

        mounted()
        {
            console.log('Component mounted.')
            this.$root.$on("upvote" + this.joke_id, msg =>
            {
                this.count = msg;
                this.down = false;
            })
        },

        methods:
        {
            downvote()
            {
                axios.post('/votes/down', { joke_id: this.joke_id })
                    .then(response =>
                    {
                        this.count = response.data['downCount'];
                        this.$root.$emit("downvote" + this.joke_id, response.data['upCount']);
                    })
                this.down = !this.down;
            },
        }
    }
</script>
