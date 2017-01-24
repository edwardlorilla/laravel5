<template>
    <div>
       <autocomplete-input  :options="users"
                            @select="onOptionSelect"
                            :data="users"
                            :columns="gridColumns"
                            >
           <template slot="item" scope="option">
               <article class="media row">
                   <figure class="col-sm-6 col-md-3 pull-left">
                       <p class="image is-64x64">
                           <img  class="img-thumbnail img-responsive" width="64"  :src="option.thumbnail">
                       </p>
                       </figure>
                   <p>
                   <strong>{{ option.title }}</strong>
                   <br> {{ option.description }}
                   </p>
                   </article>
               </template>
           </autocomplete-input>
    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>
<script>
    import AutocompleteInput from './autocomplete.vue';
    export default{
    data() {
    return {
    gridColumns: ['name', 'email'],
    users: [],
    user:{
    name: '',
    email: ''
    },
    search: '',
    url : 'api/users',

    suggestions: [],
    suggestionAttribute: 'name',
    selectedEvent: ""
    }
    },
    created:function(){
    this.fetchUsers()
    },
    methods:{
    fetchUsers(){
    this.$http.get(this.url).then(function(response){
    this.users = response.data.fetchUsers;
    })
    },
    onOptionSelect(option) {
    console.log('Selected option:', option)
    }
    },
    components: {
    'autocomplete-input':AutocompleteInput
    }
    }
</script>
