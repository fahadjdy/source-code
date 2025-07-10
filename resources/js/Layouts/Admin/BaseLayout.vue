<template>
  <div class="min-h-screen flex flex-col">
    <HeaderComponent />

    <main class="flex-grow p-4">
      <slot />
    </main>

    <FooterComponent />

  </div>
</template>

<script setup>
import HeaderComponent from './Header.vue'
import FooterComponent from './Footer.vue'
</script>
