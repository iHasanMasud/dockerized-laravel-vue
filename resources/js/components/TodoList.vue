<script setup>
import TodoItem from './TodoItem.vue'
import {onMounted, ref} from 'vue'

const newTodo = ref('')
const todos = ref([])

const addTodo = async () => {
    if (newTodo.value) {
        todos.value.push({
            id: todos.value.length + 1,
            content: newTodo.value,
            completed: false,
        })
        await axios.post('/api/todos', {
            content: newTodo.value,
            completed: false,
        })
        newTodo.value = ''
    }
}

const fetchTodos = async () => {
    const response = await axios.get('/api/todos')
    todos.value = response.data
}

const updateTodo = async (todo) => {
    await axios.put(`/api/todos/${todo.id}`, todo).then(() => {
        fetchTodos()
        console.log('Todo updated successfully')
    }).catch((error) => {
        console.log('Error updating todo', error)
    })

}

const removeTodo = async (id) => {
    todos.value = todos.value.filter((todo) => todo.id !== id)
    await axios.delete(`/api/todos/${id}`).then(() => {
        fetchTodos()
        console.log('Todo deleted successfully')
    }).catch((error) => {
        console.log('Error deleting todo', error)
    })
}

onMounted(() => {
    fetchTodos()
})

</script>

<template>
    <v-container>
        <v-card>
            <v-card-title>My Todo List</v-card-title>
            <v-card-text>
                <v-text-field
                    v-model="newTodo"
                    label="Add a new Todo"
                    clearable
                />
                <v-btn color="primary" @click="addTodo">Add</v-btn>
                <v-list v-if="todos.length">
                    <todo-item v-for="todo in todos" :key="todo.id" :todo="todo" @remove="removeTodo" @update="updateTodo" />
                </v-list>
                <v-alert v-else >Your Todo list is empty!</v-alert>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<style scoped>

</style>