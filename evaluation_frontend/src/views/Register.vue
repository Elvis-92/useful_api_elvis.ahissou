<script setup></script>

<template>
  <form @submit.prevent="register">
    <section>
      <h1>Register</h1>
      <div class="input-box">
        <input
          type="text"
          placeholder="name"
          v-model="form.name"
        />
      </div>
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
      <div class="input-box">
        <input
          type="password"
          placeholder="password confirmation"
          v-model="form.password_confirmation"
        />
      </div>
      <button type="submit">submit</button>
    </section>
  </form>
</template>
