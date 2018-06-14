<template>
    <div>
        <navbar-top></navbar-top>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
</template>

<script>
    import NavbarTop from '../components/NavbarTop.vue';
    import FooterComponent from '../components/Footer.vue';

    export default {
        components: {
            NavbarTop,
            FooterComponent,
        },
    };
</script>