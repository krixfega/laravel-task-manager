<template>
  <div class="container">
    <!-- Display Task List -->
    <div v-if="showTaskList">
      <h2>Task List</h2>
      <ul>
        <li v-for="task in storeTasks" :key="task.id">
          {{ task.name }}
          <!-- Display other task details -->
          <button @click="editTask(task)">Edit</button>
        </li>
      </ul>
      <button @click="showTaskList = false">Create New Task</button>
    </div>

    <!-- Task Form (Create or Edit) -->
    <div v-else>
      <h2>{{ editingTask ? 'Edit Task' : 'Create New Task' }}</h2>
      <form @submit.prevent="submitTask">
        <input v-model.trim="taskName" placeholder="Task Name" />
        <span v-if="!taskNameValid">Task name is required</span>

        <!-- Additional Fields -->
        <textarea v-model.trim="taskDescription" placeholder="Task Description"></textarea>
        <input type="number" v-model.number="taskPriority" placeholder="Priority" />

        <!-- Date Picker -->
        <input type="date" v-model="dueDate" />

        <!-- Other fields and validations -->

        <button :disabled="!isFormValid">
          {{ editingTask ? 'Update Task' : 'Create Task' }}
        </button>
        <button @click="cancelEditing">Cancel</button>
      </form>
    </div>
  </div>
</template>

<script>
import { required } from 'vuelidate/lib/validators';

export default {
  data() {
    return {
      showTaskList: true,
      editingTask: null,
      taskName: '',
      taskDescription: '',
      taskPriority: 1,
      dueDate: null,
  
      // Validation flags
      taskNameValid: true,
    };
  },
  computed: {
    isFormValid() {
      return (
        this.taskNameValid &&
        this.taskDescriptionValid &&
        this.dueDateValid 
      );
    },
    storeTasks() {
      return this.$store.getters.getTasks;
    },
  },
  methods: {
    submitTask() {
      // Validate fields before submission
      this.taskNameValid = !!this.taskName.trim();
  
      if (this.isFormValid) {
        if (this.editingTask) {
          // Update existing task
          this.editingTask.name = this.taskName;
          this.editingTask.description = this.taskDescription;
          this.editingTask.priority = this.taskPriority;
          this.editingTask.dueDate = this.dueDate;
          // Update other fields
          this.editingTask = null; // Reset editing mode
        } else {
          // Proceed with task creation
          const newTask = {
            name: this.taskName,
            description: this.taskDescription,
            priority: this.taskPriority,
            dueDate: this.dueDate,
          };
  
          // Add the new task to the tasks array
          this.storeTasks.push(newTask);
        }
  
        // Reset form fields after submission
        this.taskName = '';
        this.taskDescription = '';
        this.taskPriority = 1;
        this.dueDate = null;
        // Reset other fields
        this.showTaskList = true; // Show task list after submission
      }
    },
    editTask(task) {
      // Populate form fields for editing task
      this.editingTask = task;
      this.taskName = task.name;
      this.taskDescription = task.description;
      this.taskPriority = task.priority;
      this.dueDate = task.dueDate;
      // Populate other fields
      this.showTaskList = false; // Switch to edit mode
    },
    cancelEditing() {
      // Reset form fields and cancel editing
      this.editingTask = null;
      this.taskName = '';
      this.taskDescription = '';
      this.taskPriority = 1;
      this.dueDate = null;
      // Reset other fields
      this.showTaskList = true; // Show task list after canceling
    }
  }
};
</script>

<style>
/* Your styles here */
</style>
