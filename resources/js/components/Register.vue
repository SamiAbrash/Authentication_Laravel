<template>
  <div class="register-container">
    <h2>Register</h2>
    <form @submit.prevent="register" class="register-form">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" v-model="name" required>
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" v-model="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" v-model="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" v-model="password" required>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" v-model="password_confirmation" required>
      </div>
      <button type="submit">Register</button>
      <p v-if="error" class="error-message">{{ error }}</p>
    </form>
    <p>Already have an account? <router-link to="/login">Login here</router-link></p>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  data() {
    return {
      name: '',
      username: '',
      email: '',
      password: '',
      password_confirmation: '',
      error: ''
    };
  },
  methods: {
    async register() {
      try {
        const response = await axios.post('/api/register', {
          name: this.name,
          username: this.username,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        });
        const token = response.data.token;
        localStorage.setItem('token', token);
        // Check if user data is present in the response
        if (response.data && response.data.user) {
          // Redirect to Greeting page with username parameter
          this.$router.push({ name: 'Greeting', params: { username: response.data.user.username } });
        } else {
          // Handle case where user data is missing in the response
          this.error = 'Registration failed: User data is missing in the response';
        }
      } catch (error) {
        this.error = 'Registration failed: ' + (error.response ? error.response.data.message : error.message);
      }
    }
  }
};
</script>

<style scoped>
.register-container {
  max-width: 400px;
  margin: auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

.register-form {
  display: flex;
  flex-direction: column;
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
button[type="submit"] {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

.error-message {
  color: red;
  font-size: 14px;
  margin-top: 10px;
}
</style>
