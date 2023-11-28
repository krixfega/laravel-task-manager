<template>
    <div class="container">
      <h1>Create New Task</h1>
      <form @submit.prevent="createTask">
        <div class="form-group">
          <label for="name">Task Name:</label>
          <input v-model="task.name" type="text" class="form-control" id="name" required>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea v-model="task.description" class="form-control" id="description"></textarea>
        </div>
        <div class="form-group">
          <label for="priority">Priority:</label>
          <input v-model="task.priority" type="number" class="form-control" id="priority" required>
        </div>
        <div class="form-group">
          <label for="due_date">Due Date:</label>
          <input v-model="task.due_date" type="date" class="form-control" id="due_date">
        </div>
        
        <button type="submit" class="btn btn-primary">Create Task</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        task: {
          name: '',
          description: '',
          priority: 1, 
          due_date: '' 
        }
      };
    },
    methods: {
      createTask() {
        // Send a POST request to create a new task
        axios.post('/api/tasks', this.task)
          .then(response => {
            // Handle success 
            console.log('Task created:', response.data);
          })
          .catch(error => {
            // Handle error - Display an error message 
            console.error('Error creating task:', error);
          });
      }
    }
  };
  </script>
  
  <style>
 
  </style>
  