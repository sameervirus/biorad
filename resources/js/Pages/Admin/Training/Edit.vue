<template>
  <div>
    <Head :title="`${form.name}`" />
    <div class="flex justify-start mb-8 max-w-3xl">
      <h1 class="text-3xl font-bold">
        <Link class="text-lime-400 hover:text-lime-600" href="/admin/trainings">Trainings</Link>
        <span class="text-lime-400 font-medium">/</span>
        {{ form.name }}
      </h1>
    </div>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <div class="pb-8 pr-6 w-full lg:w-1/2">
            <label class="form-label">Training Date:</label>
            <input required class="form-input" type="date" v-model="form.training_date" />
          </div>
          <text-input required v-model="form.training_time" :error="form.errors.training_time" class="pb-8 pr-6 w-full lg:w-1/2" label="Training Time" />
          <text-input required v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
          <text-input v-model="form.type" :error="form.errors.type" class="pb-8 pr-6 w-full lg:w-1/2" label="Type" />
          <text-input v-model="form.by" :error="form.errors.by" class="pb-8 pr-6 w-full lg:w-1/2" label="Submitted By" />
          <text-input v-model="form.area" :error="form.errors.area" class="pb-8 pr-6 w-full lg:w-1/2" label="Area" />
          <textarea-input v-model="form.description" :error="form.errors.description" class="pb-8 pr-6 w-full lg:w-full" label="Course Short Description" />
          <file-input v-model="form.photo" :error="form.errors.photo" class="pb-8 pr-6 w-full lg:w-1/2" type="file" accept="image/*" label="Photo" />
          <div class="pb-8 pr-6 w-full lg:w-1/2">
            <img v-if="training.photo" class="block -my-2 mr-2 w-300 h-300 rounded-lg" :src="training.photo" />
          </div>
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Training</button>
          <loading-button :loading="form.processing" class="btn-orange ml-auto" type="submit">Update Training</loading-button>
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
import FileInput from '@/Shared/FileInput'
import TextareaInput from '@/Shared/TextareaInput'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    TextInput,
    FileInput,
    TextareaInput,
  },
  layout: Layout,
  props: {
    training: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        name: this.training.name,
        type: this.training.type,
        by: this.training.by,
        area: this.training.area,
        training_date: this.training.training_date,
        training_time: this.training.training_time,
        description: this.training.description,
        photo: null,
      }),
    }
  },
  methods: {
    update() {
      this.form.post(`/admin/trainings/${this.training.id}`, {
        onSuccess: () => this.form.reset('name'),
      })
    },
    destroy() {
      if (confirm('Are you sure you want to delete this training?')) {
        this.$inertia.delete(`/admin/trainings/${this.training.id}`)
      }
    },
  },
}
</script>
