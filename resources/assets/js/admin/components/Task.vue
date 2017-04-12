<template>
    <div class="col-md-3">
        <div v-bind:class="{task,'complete':task.complete,'todo':!task.complete}">
            <div class="task-name">{{task.name}}</div>

            <div class="task-description">
                {{task.description}}
            </div>

            <div class="task-controls">
                <button class="button complete-task" v-if="!task.complete" v-on:click="completeTask()">Complete this <i class="fa fa-check" aria-hidden="true"></i></button>
                <button class="button todo-task" v-else v-on:click="undoTask()"> Still need to complete <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>

            <div class="task-creator">
                Created by {{task.user.name}}
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['task'],
        methods:{
            completeTask(){
                this.task.complete = true;
                this.$store.commit('SAVE_TASK',this.task);
            },
            undoTask(){
                this.task.complete = false;
                this.$store.commit('SAVE_TASK',this.task);
            }
        },
        mounted() {

        }
    }
</script>
