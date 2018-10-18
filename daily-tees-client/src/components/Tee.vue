<template>
    <div class="column is-one-third tee-column" v-bind:key="tee.id">
        <a :href="tee.url" target="_blank">
            <div class="tee" v-bind:style="{ backgroundImage: 'url(' + tee.picture + ')' }">
                <div class="price">
                    <div>{{ tee.price / 100 }}€</div>
                </div>
                <div class="name is-inline">{{ tee.name }}</div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        props: {
            tee: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>
    .tee {
        min-height: 350px;
        min-width: 200px;
        max-width: 400px;
        background: center top no-repeat;
        position: relative;
        border-radius: 25px;
        transition: all .2s ease-in-out;
        border: black 2px solid;
    }

    .tee > .price {
        text-align: right;
        position: absolute;
        right: -20px;
        top: -20px;
        font-size: 30px;
    }

    .tee > .price > div {
        width: 70px;
        height: 60px;
        clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 45% 75%, 25% 100%, 25% 75%, 0 75%);
        background: hsl(48, 100%, 67%);
        color: rgba(0, 0, 0, 0.7);
        text-align: center;
        border-radius: 5px;
    }

    .tee > .name {
        position: absolute;
        background-color: hsl(204, 86%, 53%);
        color: #fff;
        width: 100%;
        text-align: center;
        bottom: 0;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
    }

    .tee:hover .name {
        display: none !important;
    }

    .tee:hover {
        z-index: 9;
        transform: scale(1.1);
    }
</style>