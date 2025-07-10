<!-- src/Components/Breadcrumb.vue -->
<template>
  <nav aria-label="breadcrumb" class="mb-2">     
    <ol class="flex space-x-2 text-sm text-gray-700 breadcrumb items-center">
      <font-awesome-icon :icon="['fas', 'home']" class="mr-2 align-cenetr" /> 
      <li v-for="(item, index) in items" :key="index" class="breadcrumb-item">
        <a v-if="item.url" :href="item.url">{{ item.label }}</a>
        <span v-else>{{ item.label }}</span>
      </li>
    </ol>
  </nav>
</template>

<script setup>
    const props = defineProps({
    items: {
        type: Array,
        required: true
    }
    })
</script>

<style scoped>
    .breadcrumb {
      display: flex;
      list-style: none;
      padding: 0;
    }

    .breadcrumb-item + .breadcrumb-item::before  {
      content: '>';
      margin-right: 8px;
    }
</style>
