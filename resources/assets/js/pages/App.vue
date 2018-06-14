<template>
    <div>
        <navbar-top></navbar-top>
        <router-view></router-view>
    </div>
</template>

<script>
    import NavbarTop from '../components/NavbarTop.vue';

    export default {
        components: {
            NavbarTop,
        },
    };
</script>