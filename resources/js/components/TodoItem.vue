<script setup>


const props = defineProps({
    todo: Object,
})
const emit = defineEmits(['remove', 'update'])

</script>

<template>
    <v-row v-if="todo" align="center">
        <v-col cols="5">
            <v-checkbox
                v-model="todo.completed"
                :label="todo.content"
                class="d-inline-block"
                @change="() => emit('update', todo)"
                :style="{ textDecoration: todo.completed ? 'line-through' : 'none' }"
            />
        </v-col>
        <v-col cols="2" class="text-end">
            <v-icon @click="() => emit('remove', todo.id)">mdi-delete</v-icon>
        </v-col>
    </v-row>
</template>

<style scoped>
.strikethrough {
    text-decoration: line-through;
}
</style>
