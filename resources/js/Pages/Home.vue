<script setup>
import { computed , ref  } from 'vue'
import { router } from '@inertiajs/vue3'
// import {route} from 'ziggy-js'

const props = defineProps({
  category: Object // This is the paginator object
})

const search = ref('')
const sortAsc = ref(true)

// When user clicks a pagination link, fetch new data from the server
function goToPage(page) {
  router.get('/', { page }, { preserveState: true, preserveScroll: true })
}

function handleEdit(item) {
  // For demo: alert, in real app: router.visit(route('users.edit', item.id))
  alert(`Edit: ${item.name}`)
}

// Example Delete handler
function handleDelete(item) {
  if (confirm(`Are you sure you want to delete ${item.name}?`)) {
    // In real app: router.delete(route('users.destroy', item.id))
    alert(`Deleted: ${item.name}`)
  }
}
goToPage(1) // set on 1 by default on load
</script>

<template>
  <div class="max-w-full mx-auto mt-15 ml-15 mr-15">
    <!-- ... your search & sort UI ... -->
    <div class="overflow-x-auto rounded-lg shadow">
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="bg-gray-200 text-left px-6 py-3 font-semibold text-gray-700">#</th>
            <th class="bg-gray-200 text-left px-6 py-3 font-semibold text-gray-700">Name</th>
            <th class="bg-gray-200 text-left px-6 py-3 font-semibold text-gray-700">Email</th>
            <th class="bg-gray-200 text-left px-6 py-3 font-semibold text-gray-700">Contact</th>
            <th class="bg-gray-200 text-left px-6 py-3 font-semibold text-gray-700">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(value, idx) in props.category.data"
            :key="idx"
            class="even:bg-gray-50 hover:bg-blue-50 transition"
          >
            <td class="border-t border-gray-200 px-6 py-3">{{ (props.category.current_page - 1) * props.category.per_page + idx + 1 }}</td>
            <td class="border-t border-gray-200 px-6 py-3">{{ value.name }}</td>
            <td class="border-t border-gray-200 px-6 py-3">{{ value.email }}</td>
            <td class="border-t border-gray-200 px-6 py-3">{{ value.contact }}</td>
            <td class="border-t border-gray-200 px-6 py-3">
               <button
                @click="handleEdit(value)"
                class="px-3 py-1 bg-green-600 text-white rounded-full hover:bg-green-700 transition"
              >Edit</button>
              <button
                @click="handleDelete(value)"
                class="px-3 mx-1 py-1 bg-red-600 text-white rounded-full hover:bg-red-700 transition"
              >Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Pagination Controls -->
    <div class="flex justify-between items-center mt-4">
      <div>
        <button
          @click="goToPage(props.category.current_page - 1)"
          :disabled="props.category.current_page === 1"
          class="px-3 py-1 mr-2 border rounded bg-gray-100 hover:bg-gray-200 disabled:opacity-50"
        >
          Prev
        </button>
        <button
          @click="goToPage(props.category.current_page + 1)"
          :disabled="props.category.current_page === props.category.last_page"
          class="px-3 py-1 border rounded bg-gray-100 hover:bg-gray-200 disabled:opacity-50"
        >
          Next
        </button>
      </div>
      <span class="text-gray-600 text-sm">
        Page {{ props.category.current_page }} of {{ props.category.last_page }}
      </span>
    </div>
  </div>
</template>
