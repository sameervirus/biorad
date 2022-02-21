<template>
  <div class="d-flex">
    <div class="bg-section">
      <div class="bg-image" style="background-image: url(img/login.jpg)"></div>
    </div>
    <div class="login-section">
      <div class="login-warp">
        <div class="text-center">
          <logo class="login-logo" height="50" />
          <h2 class="login-title">Digital Garden</h2>
          <h3 class="login-subtitle">
            Your universe in <br /><span class="fw-bold">one click</span>
          </h3>
        </div>
        <form class="login-form" @submit.prevent="login">
          <div class="form-box">
            <p class="form-title">Welcome to Bio-Rad</p>
            <div class="form-floating mb-3">
              <input
                v-model="form.email"
                :error="form.errors.email"
                type="email"
                class="form-control"
                id="floatingInput"
                placeholder="name@example.com"
              />
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input
                v-model="form.password"
                :error="form.errors.password"
                type="password"
                class="form-control"
                id="floatingPassword"
                placeholder="Password"
              />
              <label for="floatingPassword">Password</label>
            </div>
            <div class="d-flex mt-1 mb-2">
              <div class="form-check">
                <input
                  class="form-check-input mr-1"
                  v-model="form.remember"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label text-sm" for="flexCheckDefault">
                  Remember Me
                </label>
              </div>
              <Link class="ms-auto" href="/forgot-password"
                ><label class="form-labels">
                  <span class="form-text">Forgot your password?</span>
                </label></Link
              >
            </div>
            <div class="d-flex justify-content-center mt-4">
              <loading-button
                :loading="form.processing"
                class="btn-greens py-8"
                type="submit"
                >Login</loading-button
              >
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Logo from '@/Shared/Logo'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    Logo,
    TextInput,
  },
  data() {
    return {
      form: this.$inertia.form({
        email: 'johndoe@example.com',
        password: 'secret',
        remember: false,
      }),
    }
  },
  methods: {
    login() {
      this.form.post('/login')
    },
  },
}
</script>
