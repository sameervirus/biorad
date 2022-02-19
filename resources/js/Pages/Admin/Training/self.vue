<template>
  <div>
    <Head title="Self Learning Courses" />
    <h1 class="mb-8 text-3xl font-bold">Self Learning Courses</h1>
    <div class="mb-6">
      <div class="flex items-center justify-between mb-6">
        <div class="text-2xl font-bold">Quality Control</div>
        <a
          class="btn-orange cursor-pointer"
          @click="addVideo('Quality Control')"
        >
          <span>Add Quality Control</span>
          <span class="hidden md:inline">&nbsp;Video</span>
        </a>
      </div>
      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Category</th>
            <th class="pb-4 pt-6 px-6">Title</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Link</th>
          </tr>
          <tr
            v-for="t in getType(selfs, 'quality-control')"
            :key="t.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1 focus:text-lime-500"
                @click="editVideo(t)"
              >
                {{ t.category }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.title }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.link }}
              </a>
            </td>
            <td class="w-px border-t">
              <a
                class="flex items-center px-4"
                @click="editVideo(t)"
                tabindex="-1"
              >
                <icon
                  name="cheveron-right"
                  class="block w-6 h-6 fill-gray-400"
                />
              </a>
            </td>
          </tr>
          <tr v-if="getType(selfs, 'quality-control').length === 0">
            <td class="px-3 py-1 border-t" colspan="4">No Courses found.</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="mb-6">
      <div class="flex items-center justify-between mb-6">
        <div class="text-2xl font-bold">Hemoglobin Testing</div>
        <a
          class="btn-orange cursor-pointer"
          @click="addVideo('Hemoglobin Testing')"
        >
          <span>Add Hemoglobin Testing</span>
          <span class="hidden md:inline">&nbsp;Video</span>
        </a>
      </div>
      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Category</th>
            <th class="pb-4 pt-6 px-6">Title</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Link</th>
          </tr>
          <tr
            v-for="t in getType(selfs, 'hemoglobin-testing')"
            :key="t.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1 focus:text-lime-500"
                @click="editVideo(t)"
              >
                {{ t.category }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.title }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.link }}
              </a>
            </td>
            <td class="w-px border-t">
              <a
                class="flex items-center px-4"
                @click="editVideo(t)"
                tabindex="-1"
              >
                <icon
                  name="cheveron-right"
                  class="block w-6 h-6 fill-gray-400"
                />
              </a>
            </td>
          </tr>
          <tr v-if="getType(selfs, 'hemoglobin-testing').length === 0">
            <td class="px-3 py-1 border-t" colspan="4">No Courses found.</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="mb-6">
      <div class="flex items-center justify-between mb-6">
        <div class="text-2xl font-bold">Blood Typing</div>
        <a class="btn-orange cursor-pointer" @click="addVideo('Blood Typing')">
          <span>Add Blood Typing</span>
          <span class="hidden md:inline">&nbsp;Video</span>
        </a>
      </div>
      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Category</th>
            <th class="pb-4 pt-6 px-6">Title</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Link</th>
          </tr>
          <tr
            v-for="t in getType(selfs, 'blood-typing')"
            :key="t.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1 focus:text-lime-500"
                @click="editVideo(t)"
              >
                {{ t.category }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.title }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.link }}
              </a>
            </td>
            <td class="w-px border-t">
              <a
                class="flex items-center px-4"
                @click="editVideo(t)"
                tabindex="-1"
              >
                <icon
                  name="cheveron-right"
                  class="block w-6 h-6 fill-gray-400"
                />
              </a>
            </td>
          </tr>
          <tr v-if="getType(selfs, 'blood-typing').length === 0">
            <td class="px-3 py-1 border-t" colspan="4">No Courses found.</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="mb-6">
      <div class="flex items-center justify-between mb-6">
        <div class="text-2xl font-bold">Infectious disease & Microbiology</div>
        <a
          class="btn-orange cursor-pointer"
          @click="addVideo('Infectious disease & Microbiology')"
        >
          <span>Add Infectious disease & Microbiology</span>
          <span class="hidden md:inline">&nbsp;Video</span>
        </a>
      </div>
      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Category</th>
            <th class="pb-4 pt-6 px-6">Title</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Link</th>
          </tr>
          <tr
            v-for="t in getType(selfs, 'infectious-disease-microbiology')"
            :key="t.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1 focus:text-lime-500"
                @click="editVideo(t)"
              >
                {{ t.category }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.title }}
              </a>
            </td>
            <td class="border-t">
              <a
                class="flex items-center px-3 py-1"
                @click="editVideo(t)"
                tabindex="-1"
              >
                {{ t.properties.link }}
              </a>
            </td>
            <td class="w-px border-t">
              <a
                class="flex items-center px-4"
                @click="editVideo(t)"
                tabindex="-1"
              >
                <icon
                  name="cheveron-right"
                  class="block w-6 h-6 fill-gray-400"
                />
              </a>
            </td>
          </tr>
          <tr
            v-if="
              getType(selfs, 'infectious-disease-microbiology').length === 0
            "
          >
            <td class="px-3 py-1 border-t" colspan="4">No Courses found.</td>
          </tr>
        </table>
      </div>
    </div>
    <vue-final-modal :click-to-close="false" v-model="showModal">
      <div class="flex min-h-screen">
        <div
          class="max-w-3xl bg-white rounded-md shadow overflow-hidden m-auto"
        >
          <form @submit.prevent="store">
            <div class="flex flex-wrap -mb-8 -mr-6 p-8">
              <text-input
                readonly
                v-model="form.type"
                :error="form.errors.type"
                class="pb-8 pr-6 w-full lg:w-1/2"
                label="Type"
              />
              <text-input
                v-model="form.category"
                :error="form.errors.category"
                class="pb-8 pr-6 w-full lg:w-1/2"
                label="Category"
              />
              <text-input
                required
                v-model="form.title"
                :error="form.errors.title"
                class="pb-8 pr-6 w-full lg:w-1/2"
                label="Title *"
              />
              <text-input
                v-model="form.sub_title"
                :error="form.errors.sub_title"
                class="pb-8 pr-6 w-full lg:w-1/2"
                label="Sub title"
              />
              <text-input
                required
                v-model="form.link"
                :error="form.errors.link"
                class="pb-8 pr-6 w-full lg:w-1/2"
                label="Youtube link *"
              />
              <file-input
                v-model="form.photo"
                :error="form.errors.photo"
                class="pb-8 pr-6 w-full lg:w-1/2"
                type="file"
                accept="image/*"
                label="Photo"
              />
            </div>
            <div
              class="flex items-center justify-between px-8 py-4 bg-gray-50 border-t border-gray-100"
            >
              <button
                class="text-red-600 hover:underline"
                tabindex="-1"
                type="button"
                @click="destroy()"
              >
                Delete video
              </button>

              <button
                class="text-green-600 hover:underline"
                tabindex="-1"
                type="button"
                @click="cancel()"
              >
                Cancel
              </button>

              <loading-button
                :loading="form.processing"
                class="btn-orange"
                type="submit"
                >Save</loading-button
              >
            </div>
          </form>
        </div>
      </div>
    </vue-final-modal>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import Layout from '@/Layouts/Admin'
import FileInput from '@/Shared/FileInput'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'
import { $vfm, VueFinalModal, ModalsContainer } from 'vue-final-modal'

export default {
  components: {
    Head,
    Icon,
    Link,
    FileInput,
    TextInput,
    LoadingButton,
    VueFinalModal,
    ModalsContainer,
  },
  layout: Layout,
  props: {
    selfs: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        id: 0,
        type: '',
        category: '',
        title: '',
        sub_title: '',
        photo: null,
        link: '',
      }),
      showModal: false,
      selectedItem: null,
    }
  },
  methods: {
    getType(array, str) {
      return array.filter((i) => i.type_slug === str)
    },
    addVideo(t) {
      this.form.type = t
      this.showModal = true
    },
    editVideo(t) {
      this.form.id = t.id
      this.form.type = t.type
      this.form.category = t.category
      this.form.title = t.properties.title
      this.form.sub_title = t.properties.sub_title
      this.form.link = t.properties.link
      this.showModal = true
    },
    cancel() {
      this.form.reset()
      this.showModal = false
    },
    store() {
      this.form.post(`/admin/self-learning/`, {
        onSuccess: () => {
          this.form.reset()
          this.showModal = false
        },
      })
    },
    destroy() {
      if (confirm('Are you sure you want to delete this Course?')) {
        this.$inertia.delete(`/admin/self-learning/${this.selectedItem.id}`)
      }
    },
  },
}
</script>
