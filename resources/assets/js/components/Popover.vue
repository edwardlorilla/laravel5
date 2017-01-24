<template>
    <div class="inline">
        <a href="#" v-on:mouseover="hover" v-on:mouseout="hoverOut">{{ user.name }}</a>
        <div class="user-popover" v-if="showPopup" transition="fade" :mouseover="hoverInfo" v-on:mouseout="hoverOutInfo">
            <h3>{{ user.name }}</h3>
            <button>Follow {{user.name}}</button>
            </div>
        </div>
    </template>
<style>

    </style>
<script>
    export default{
    props: ['user'],
    data(){
    return{
        showPopup: false,
        timer: '',
        isInInfo: false
        }
    },
    methods: {
        hover: function()
        {
        let vm = this;
        this.timer = setTimeout(function() {
        vm.showPopover();
        }, 600);
        },

        hoverOut: function()
        {
        let vm = this;
        clearTimeout(vm.timer);
        this.timer = setTimeout(function() {
        if(!vm.isInInfo)
            {
                vm.closePopover();
            }
        }, 200);
        },
            hoverInfo: function()
        {
            this.isInInfo = true;
        },
            hoverOutInfo: function()
        {
            this.isInInfo = false;
            this.hoverOut();
        },
        showPopover: function()
        {
            this.showPopup = true;
        },
            closePopover: function()
        {
            this.showPopup = false;
        }
    }
    }
    </script>
