<template>
  <div>
    <Head title="Create Training" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-lime-400 hover:text-lime-600" href="/admin/trainings">Trainings</Link>
      <span class="text-lime-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
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
          <file-input v-model="form.photo" :error="form.errors.photo" class="pb-8 pr-6 w-full lg:w-1/2" type="file" accept="image/*" label="Photo" />
          <select-input v-model="form.category" :error="form.errors.category" class="pb-8 pr-6 w-full lg:w-1/2" label="Category">
            <option v-for="(r, i) of categories" :key="i" :value="r">{{ r }}</option>
          </select-input>
          <textarea-input v-model="form.short_desc" :error="form.errors.short_desc" class="pb-8 pr-6 w-full lg:w-full" label="Course Short Description" />
          <div class="pb-8 pr-6 w-full lg:w-full">
            <QuillEditor v-model:content="form.description" contentType="html" placeholder="Type and style Description" toolbar="full" theme="snow" />
          </div>
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-orange" type="submit">Create Training</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Admin'
import FileInput from '@/Shared/FileInput'
import TextInput from '@/Shared/TextInput'
import TextareaInput from '@/Shared/TextareaInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'

import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

export default {
  components: {
    FileInput,
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TextareaInput,
    QuillEditor,
  },
  layout: Layout,
  props: {
    permissions: Array,
  },
  remember: 'form',
  data() {
    return {
      categories: ['Self Learning Couses', 'Sales &amp; Applicatons Training Courses', 'Technical Courses'],
      form: this.$inertia.form({
        name: '',
        type: '',
        by: '',
        area: '',
        training_date: '',
        training_time: '',
        description: '',
        short_desc: '',
        category: '',
        photo: null,
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/admin/trainings')
    },
  },
}
</script>

<style>
.ql-container {
  min-height: 50px;
  width: 100%;
}
</style>
