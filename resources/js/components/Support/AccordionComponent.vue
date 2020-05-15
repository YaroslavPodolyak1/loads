<template>
    <div id="accordion">
        <slot name="toggleBtn"></slot>
        <slot name="content"></slot>
    </div>
</template>

<script>
    export default {
        name: "AccordionComponent",
        data () {
            return {};
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
