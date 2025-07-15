<template>

  <Head>
    <!-- [Favicon] icon -->
    <link rel="icon" href="../../../../assets/images/favicon.svg" type="image/x-icon"> <!-- [Google Font] Family -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
      id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="../../../../assets/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="../../../../assets/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="../../../../assets/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="../../../../assets/fonts/material.css">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="../../../../assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="../../../../assets/css/style-preset.css">
  </Head>

  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <NavbarComponent />

  <HeaderComponent />

  <div class="pc-container">
    <div class="pc-content">
      <slot />
    </div>
  </div>

  <FooterComponent />

</template>
<script setup>
import { Head } from '@inertiajs/vue3'
import HeaderComponent from './Header.vue'
import NavbarComponent from './Navbar.vue'
import FooterComponent from './Footer.vue'
import { onMounted } from 'vue'



onMounted(() => {

  
})

</script>
