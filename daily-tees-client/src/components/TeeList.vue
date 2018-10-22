<template>
    <div class="container">
        <section class="section">
            <div @click="updateTees">Click</div>
        </section>
        <section class="section">
            <div class="container">
                <div class="columns is-multiline">
                    <tee
                        v-for="tee in tees"
                        v-bind:tee="tee"
                        v-bind:key="tee.id"
                    ></tee>
                </div>
            </div>
        </section>
    </div>
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
        methods: {
            async updateTees() {
                const response = await axios.get(
                    global.config.host + global.config.endpoints.tees+'?site=2',
                    {
                        headers: {
                            Accept: 'application/json'
                        }
                    });
                this.tees = response.data;
            }
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