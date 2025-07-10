
<template>
      <Breadcrumb :items="breadcrumb" />
        Dashboard
        <br>
      <Button :type="'button'" :label="'Submit'" />
</template>
<script setup>
  import Breadcrumb from '@/Components/Breadcrumb.vue'
  import Button from '@/Components/Button.vue'
  const breadcrumb = [
          { label: 'Dashboard' },
  ]

</script>
