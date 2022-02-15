<template>
  <div class="flex">
    <div class="hidden lg:block lg:w-3/5 min-h-screen">
      <div class="bg-cover bg-center min-h-screen" style="background-image: url(/img/Autoimmunity-Biological.jpg)"></div>
    </div>
    <div class="w-full lg:w-2/5 min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-24">
      <div class="max-w-md w-full space-y-8">
        <div class="text-center">
          <logo class="block mx-auto w-full max-w-xs" height="50" />
          <h2 class="mt-4 mb-2 text-4xl font-extrabold text-greens uppercase">Digital Garden</h2>
          <h3 class="text-3xl uppercase">Your universe in <br /><span class="font-bold">one click</span></h3>
        </div>
        <form class="mt-4 bg-white rounded-lg border border-solid border-gray-200 overflow-hidden" @submit.prevent="login">
          <div class="px-6 py-6">
            <p class="text-extrabold text-xl text-center">Welcome to Bio-Rad</p>
            <text-input v-model="form.email" :error="form.errors.email" readonly class="mt-4" label="Email" type="email" autofocus autocapitalize="off" />
            <text-input v-model="form.password" :error="form.errors.password" class="mt-2" label="New Password" type="password" />
            <text-input v-model="form.password_confirmation" :error="form.errors.password_confirmation" class="mt-2" label="Confirm Password" type="password" />
            <div class="flex justify-center mt-3">
              <loading-button :loading="form.processing" class="btn-greens py-8" type="submit"> Reset Password </loading-button>
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
  props: {
    email: String,
    token: String,
  },
  data() {
    return {
      form: this.$inertia.form({
        token: this.token,
        email: this.email,
        password: '',
        password_confirmation: '',
      }),
    }
  },
  methods: {
    login() {
      this.form.post('/reset-password')
    },
  },
}
</script>
