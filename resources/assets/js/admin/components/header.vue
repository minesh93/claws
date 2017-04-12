<template>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><router-link to="/">Home</router-link></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tasks <span class="badge">{{totalTodos}}</span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><router-link to="/tasks/">View Tasks</router-link></li>
                <li><router-link to="/tasks/add/">Add New Task</router-link></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</template>

<script>
    export default {
        computed:{
          totalTodos(){
            return this.$store.getters.totalTasks
          },
        },
        mounted() {
            
        }
    }
</script>
