<template>
    <div>
        <div class="columns">
            <template v-for="tee in tees">
                <a :href="tee.url" v-bind:key="tee.id">
                    <div class="column">
                        <div><img :src="tee.picture"></div>
                        <div>{{ tee.price }}</div>
                    </div>
                </a>
            </template>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                tees: {}
            }
        },
        async created () {
            const response = await axios.get(global.config.host+global.config.endpoints.tees, { headers: {Accept: 'application/json'}});
            this.tees = response.data;
        }
    }
</script>