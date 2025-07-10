<script setup>
import { Link, router, usePage } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import { faUser } from '@fortawesome/free-solid-svg-icons'
const page = usePage()

const logout = () => {
  router.post('/logout') 
}
</script>

<template>
  <header class="p-4 bg-gray-800 text-white flex justify-between">
    <ul class="flex space-x-4">
      <li>
        <Link
          href="/admin/dashboard"
          class="px-4 py-2 no-underline hover:bg-gray-700"
          :class="{ 'bg-gray-700': page.url === '/admin/dashboard' }"
        >
          Dashboard
        </Link>
      </li>
      <li>
        <Link
          href="/admin/profile"
          class="px-4 py-2 no-underline hover:bg-gray-700"
          :class="{ 'bg-gray-700': page.url === '/admin/profile' }"
        >
          Profile
        </Link>
      </li>
    </ul>

    <div class="flex items-center space-x-4">
      <div v-if="page.props.auth.user">
            <font-awesome-icon :icon="['fas', 'user']" class="mr-2" /> 
         {{ page.props.auth.user.name }}
      </div>
      <button
        @click="logout"
        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded"
      >
        Logout
      </button>
    </div>
  </header>
</template>
