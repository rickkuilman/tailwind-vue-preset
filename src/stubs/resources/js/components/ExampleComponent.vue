<template>
    <div>
        <p>
            {{ joke }}
        </p>
        <button @click="retrieveJoke">
            Retrieve Chuck Norris joke
        </button>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                joke: ''
            }
        },
        methods: {
            retrieveJoke: function () {
                axios.get('https://api.chucknorris.io/jokes/random')
                    .then(response => (this.joke = response.data.value))
            }
        }
    }
</script>
