<template>
    <div>
        <Header />
        <h1 >Saque</h1>
    </div>
</template>

<script>
import Header from '../src/components/Header.vue';
    export default {
        name: 'Saque',
        components: {
            Header
        },
    }
</script>

<style scoped>
h1 {
    color: #000;
    font-family: "Open Sans";
    font-size: 24px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin-top: 36px;
}
</style>