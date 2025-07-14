
<template>
      <Breadcrumb :items="breadcrumb" />
      

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Hello card</h5>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
</template>
<script setup>
  import Breadcrumb from '@/Components/Breadcrumb.vue'
  
  const breadcrumb = [
          // { label: 'Sample Page' , url: '/admin/dashboard' },
          { label: 'Dashboard'  },
  ]

</script>
