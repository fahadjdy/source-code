<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <header class="bg-gray-300 text-center">
    <ul class="list-none m-0 p-0 flex bg-gray-100">
      <li>
        <Link
          href="/"
          class="block text-red-900 text-center px-4 py-3 no-underline hover:bg-red-200"
          :class="{ 'bg-green-600 text-white': $page.url === '/?page=1' }"
        >
          Home
        </Link>
      </li>
      <li>
        <Link
          href="/about"
          class="block text-red-900 text-center px-4 py-3 no-underline hover:bg-red-200"
          :class="{ 'bg-green-600 text-white': $page.url === '/about' }"
        >
          About
        </Link>
      </li>
    </ul>
  </header>
</template>
