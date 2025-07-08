<script setup>
  import { reactive } from 'vue'
  import { router } from '@inertiajs/vue3'

  const form = reactive({
    email: '',
    password: '',
  })

  const submit = () => {
    router.post('/login', form)
  }
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">
      <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h2>

      <form @submit.prevent="submit">
        <div v-if="$page.props.errors.email" class="text-red-500 text-sm">
          {{ $page.props.errors.email }}
        </div>
        <!-- Email -->
        <div class="mb-4">
          <label class="block text-gray-600 mb-1" for="email">Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <font-awesome-icon :icon="['fas', 'envelope']" />
            </span>
            <input
              id="email"
              type="email"
              v-model="form.email"
              required
              placeholder="you@example.com"
              class="pl-10 pr-4 py-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
        </div>

        <!-- Password -->
        <div class="mb-6">
          <label class="block text-gray-600 mb-1" for="password">Password</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <font-awesome-icon :icon="['fas', 'lock']" />
            </span>
            <input
              id="password"
              type="password"
              v-model="form.password"
              required
              placeholder="••••••••"
              class="pl-10 pr-4 py-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
        >
          Sign In
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
    }
  },
  methods: {
    submit() {
       this.$inertia.post('/login', this.form)
    }
  }
}
</script>
