<template>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <router-link v-bind:to="'/'" class="navbar-brand">Laravel Vue</router-link>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><router-link :to="{ name: 'event' }">Event</router-link></li>
                        <li><router-link :to="{ name: 'about' }">About</router-link></li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>

</script>