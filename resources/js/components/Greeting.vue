<template>
  <div class="greeting-container">
    <h2>Hello, {{ username }}</h2>
    <button @click="logout" class="logout-button">Logout</button>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  props: ['username'],
  methods: {
    async logout() {
      try {
        const token = localStorage.getItem('token');
        await axios.post('/api/logout', {}, {
          headers: { 'Authorization': `Bearer ${token}` }
        });
        localStorage.removeItem('token');
        this.$router.push({ name: 'Login' });
      } catch (error) {
        console.error('Logout failed:', error);
      }
    }
  }
};
</script>

<style scoped>
.greeting-container {
  max-width: 400px;
  margin: auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

h2 {
  margin-bottom: 20px;
}

.logout-button {
  padding: 10px 20px;
  background-color: #dc3545;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.logout-button:hover {
  background-color: #c82333;
}
</style>
