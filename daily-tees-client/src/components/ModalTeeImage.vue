<template>
    <p class="image is-4by3">
        <img v-bind:src="tee_modal.picture">
    </p>
</template>

<script>
    export default {
        props: ['tee_modal'],
        data() {
            return {
                tee_modal: this.tee
            }
        }
    }
</script>