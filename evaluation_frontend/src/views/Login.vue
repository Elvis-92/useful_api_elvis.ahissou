<script setup></script>

<template>
  <form @submit.prevent="login">
    <section>
      <h1>Login</h1>
      
      <div class="input-box">
        <input
          type="email"
          placeholder="email"
          v-model="form.email"
        />
      </div>
      <div class="input-box">
        <input
          type="password"
          placeholder="password"
          v-model="form.password"
        />
      </div>
      <button type="submit">Login</button>
    </section>
  </form>
</template>
