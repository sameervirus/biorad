<template>
  <div>
    <div
      class="border-solid border-b border-lime-900"
      :class="isUrl('') ? 'bg-oranges' : ''"
    >
      <Link class="group flex items-center p-2" href="/admin">
        <icon name="dashboard" class="mr-2 w-4 h-4 fill-white" />
        <div class="text-white">Dashboard</div>
      </Link>
    </div>
    <div
      class="border-solid border-b border-lime-900"
      :class="isUrl('/trainings') ? 'bg-oranges' : ''"
    >
      <Link class="group flex items-center p-2" href="/admin/trainings">
        <icon name="office" class="mr-2 w-4 h-4 fill-white" />
        <div class="text-white">Trainings</div>
      </Link>
    </div>
    <div
      class="border-solid border-b border-lime-900"
      :class="isUrl('/self-learning') ? 'bg-oranges' : ''"
    >
      <Link class="group flex items-center p-2" href="/admin/self-learning">
        <icon name="office" class="mr-2 w-4 h-4 fill-white" />
        <div class="text-white">Self Learning Cources</div>
      </Link>
    </div>
    <div
      class="border-solid border-b border-lime-900"
      :class="isUrl('/users') ? 'bg-oranges' : ''"
    >
      <Link class="group flex items-center p-2" href="/admin/users">
        <icon name="users" class="mr-2 w-4 h-4 fill-white" />
        <div class="text-white">Users</div>
      </Link>
    </div>
    <div
      class="border-solid border-b border-lime-900"
      :class="isUrl('/roles') ? 'bg-oranges' : ''"
    >
      <Link class="group flex items-center p-2" href="/admin/roles">
        <icon name="roles" class="mr-2 w-4 h-4 fill-white" />
        <div class="text-white">Roles</div>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      urls = urls.map((a) => a.replace('admin', ''))
      currentUrl = currentUrl.replace('admin', '')
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
