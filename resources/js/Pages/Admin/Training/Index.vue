<template>
  <div>
    <Head title="Trainings" />
    <h1 class="mb-8 text-3xl font-bold">Trainings</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter
        v-model="form.search"
        class="mr-4 w-full max-w-md"
        @reset="reset"
      >
      </search-filter>
      <Link class="btn-orange" href="/admin/trainings/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Training</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Date</th>
          <th class="pb-4 pt-6 px-6">Time</th>
          <th class="pb-4 pt-6 px-6">Name</th>
          <th class="pb-4 pt-6 px-6">By</th>
          <th class="pb-4 pt-6 px-6" colspan="2">Category</th>
        </tr>
        <tr
          v-for="t in trainings.data"
          :key="t.id"
          class="hover:bg-gray-100 focus-within:bg-gray-100"
        >
          <td class="border-t">
            <Link
              class="flex items-center px-3 py-1 focus:text-lime-500"
              :href="`/admin/trainings/${t.id}/edit`"
            >
              {{ t.training_date }}
            </Link>
          </td>
          <td class="border-t">
            <Link
              class="flex items-center px-3 py-1"
              :href="`/admin/trainings/${t.id}/edit`"
              tabindex="-1"
            >
              {{ t.training_time }}
            </Link>
          </td>
          <td class="border-t">
            <Link
              class="flex items-center px-3 py-1"
              :href="`/admin/trainings/${t.id}/edit`"
              tabindex="-1"
            >
              {{ t.name }}
            </Link>
          </td>
          <td class="border-t">
            <Link
              class="flex items-center px-3 py-1"
              :href="`/admin/trainings/${t.id}/edit`"
              tabindex="-1"
            >
              {{ t.by }}
            </Link>
          </td>
          <td class="border-t">
            <Link
              class="flex items-center px-3 py-1"
              :href="`/admin/trainings/${t.id}/edit`"
              tabindex="-1"
            >
              {{ t.category }}
            </Link>
          </td>
          <td class="w-px border-t">
            <Link
              class="flex items-center px-4"
              :href="`/admin/trainings/${t.id}/edit`"
              tabindex="-1"
            >
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="trainings.data.length === 0">
          <td class="px-3 py-1 border-t" colspan="4">No Trainings found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="trainings.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import Layout from '@/Layouts/Admin'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import SearchFilter from '@/Shared/SearchFilter'
import Pagination from '@/Shared/Pagination'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    trainings: Array,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/admin/trainings', pickBy(this.form), {
          preserveState: true,
        })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
