<template>
   <div>
    <b>Neuer To-Do:</b> <br>
    <input v-model="todo_neu"> <button @click="addTodo()">Hinzufügen</button>
 
    <br><br>
 
    <b>Offene To-Dos:</b>
    <ul>
        <li v-for="item in todo_list" :key="item.id">#{{item.id}} - {{ item.text }}  <button @click="deleteTodo(item.id)">Löschen</button> </li>
    </ul>
    
</div>
</template>

<script>
import axios from 'axios'
export default {
  
  name: 'App',
  data(){
    return{
     todo_neu: "",
     todo_list: []
    }
    },methods: {
            fetchData() {
                axios.get('./get.php').then(response => (this.todo_list = response.data));
            },
            addTodo() {
              console.log("Hi there");
                axios.get('./add.php?text='+encodeURIComponent(this.todo_neu))
                    .then(response => (this.todo_list = response.data))
                    .then(function() {
                        this.todo_neu = "";
                        this.fetchData();
                    }.bind(this));
            },
            deleteTodo(id) {
                axios.get('delete.php?id='+encodeURIComponent(id))
                    .then(function() {
                        this.fetchData();
                    }.bind(this));
            }
        },
        created() {
            this.fetchData();
        }

  }
</script>