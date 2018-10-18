<template>
    <section class="section">
        <div class="container">
            <div class="columns is-multiline">
                <tee
                    v-for="tee in tees"
                    v-bind:tee="tee"
                ></tee>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from 'axios'
    import Tee from './Tee.vue';

    export default {
        data() {
            return {
                tees: {},
            }
        },
        components: {
            Tee
        },
        async created () {
            const response = await axios.get(
                global.config.host + global.config.endpoints.tees,
                {
                    headers: {
                        Accept: 'application/json'
                    }
                });
            this.tees = response.data;
        }
    }
</script>