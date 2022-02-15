<template>
  <div>
    <Head :title="`${form.name}`" />
    <div class="flex justify-start mb-8 max-w-3xl">
      <h1 class="text-3xl font-bold">
        <Link class="text-lime-400 hover:text-lime-600" href="/admin/roles">Roles</Link>
        <span class="text-lime-400 font-medium">/</span>
        {{ form.name }}
      </h1>
    </div>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-full" label="Name" />
          <h3 class="block font-bold w-full mb-2">Permissions</h3>
          <div class="form-check pb-8 pr-6 w-full lg:w-1/3" v-for="p of permissions" :key="p.id">
            <input :id="p.id" v-model="form.items" type="checkbox" :value="p.id" :checked="form.items.includes(p.id)" class="form-check form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" />
            <label class="check-label inline-block text-gray-800" :for="p.id">{{ p.name }}</label>
          </div>
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Role</button>
          <loading-button :loading="form.processing" class="btn-orange ml-auto" type="submit">Update Role</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Admin'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    TextInput,
  },
  layout: Layout,
  props: {
    role: Object,
    permissions: Array,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        name: this.role.name,
        items: this.role.role_permissions,
      }),
    }
  },
  methods: {
    update() {
      this.form.post(`/admin/roles/${this.role.id}`, {
        onSuccess: () => this.form.reset('name'),
      })
    },
    destroy() {
      if (confirm('Are you sure you want to delete this role?')) {
        this.$inertia.delete(`/admin/roles/${this.role.id}`)
      }
    },
  },
}
</script>
