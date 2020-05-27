<template>
    <b-navbar toggleable="lg" type="dark" variant="info">
        <b-navbar-brand href="#">PML</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
            <!-- <b-nav-item href="#">Orders</b-nav-item> -->
            <b-nav-item href="#" v-b-toggle.sidebar-backdrop> <b-icon icon="plus-square"></b-icon> Add Order</b-nav-item>
        </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>

<script>
    export default {
        mounted() {
            
        }
    }
</script>
