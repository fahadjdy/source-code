<!-- src/Components/Breadcrumb.vue -->
<template>
    <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 v-if="!items[items.length-1].url" class="m-b-10">{{ items[items.length-1].label }}</h5>
              </div>
              <ul class="flex space-x-2 text-sm text-gray-700 breadcrumb items-center">
                <li v-for="(item, index) in items" :key="index" class="breadcrumb-item">
                  <Link v-if="item.url" :href="item.url">{{ item.label }}</Link>
                  <span v-else>{{ item.label }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
</template>

<script setup>
  import { Link } from '@inertiajs/vue3'
    const props = defineProps({
    items: {
        type: Array,
        required: true
    }
    })
</script>
