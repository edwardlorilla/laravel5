<template>
    <div >

        <vue-instant id="styles"
                     @input="searchUsers"
                     v-model="search"
                     :suggestion-attribute="suggestionAttribute"
                     :suggestions="suggestions"
                     :disabled="false"
                     :show-autocomplete="true"
                     type="facebook"
        >

        </vue-instant>
        <table class="table">
            <thead>
                <th>First Name</th>
                <th>Email</th>
            </thead>
            <tbody name="fade" is="transition-group" >
                <tr v-for="user in users"  v-bind:key="user.id" >
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                </tr>
            </tbody>
        </table>


    </div>
</template>

<script>
import axios from 'axios'
import VueInstant from 'vue-instant/src/components/VueInstant.vue'

    export default {
    data() {
    return {
           users: [],
           search: '',
           url : 'api/users',
           urlSearch: 'api/usersearch',
           suggestions: [],
           suggestionAttribute: 'name',
           selectedEvent: ""
        }
    },

    created:function(){
        this.fetchUsers()
    },
    computed:{

    },
    methods:{
        searchUsers(){
            var that = this
            this.suggestions = []
            this.$http.get(this.urlSearch + '?search=' + this.search).then(function(response){
              response.data.users.forEach(function (a) {
                that.suggestions.push(a)
              })
            })
        },
        fetchUsers(){
             this.$http.get(this.url).then(function(response){
              this.users = response.data.fetchUsers;
            })
        }
    },
        components: {
            'vue-instant': VueInstant
        }

}
    </script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>