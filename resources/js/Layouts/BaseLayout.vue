<template>
  <div>
    <HeaderComponent />
    <main>
      <slot />
    </main>
    <FooterComponent />
  </div>
</template>

<script setup>
import HeaderComponent from './Header.vue'
import FooterComponent from './Footer.vue'
</script>
