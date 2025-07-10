<!-- src/Pages/Admin/Profile.vue -->
<template>
  <Breadcrumb :items="breadcrumb" />
</template>

<script setup>
import Breadcrumb from '@/Components/Breadcrumb.vue'

const breadcrumb = [
        { label: 'Dashboard', url: '/admin/dashboard' },
        { label: 'Profile' }
]

</script>
