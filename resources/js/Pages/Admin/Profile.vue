<!-- src/Pages/Admin/Profile.vue -->
<template>
  <Breadcrumb :items="breadcrumb" />
  <form @submit.prevent="submitForm" class="container py-4">
    <div class="row">
      <div class="card shadow-sm mb-4 col-sm-5 mr-12">
        <div class="card-header">
          <h5 class="mb-0 text-dark"><i class="fa fa-industry"></i> &nbsp; Business Information</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" v-model="form.name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="slogan" class="form-label">Slogan</label>
            <input type="text" id="slogan" v-model="form.slogan" class="form-control">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" v-model="form.address" class="form-control" rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="card shadow-sm mb-4 col-sm-6 ">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fa fa-phone"></i> &nbsp; Contacts</h5>
          <button type="button" class="btn btn-sm btn-outline-primary" @click="addContact">+ Add Contact</button>
        </div>
        <div class="card-body">
          <div class="mb-3" v-for="(contact, index) in form.contacts" :key="index">
            <label :for="'contact-' + index" class="form-label">Contact {{ index + 1 }}</label>
            <input type="text" :id="'contact-' + index" v-model="form.contacts[index]" class="form-control">
          </div>
        </div>
      </div>

      <div class="card shadow-sm mb-4">
        <div class="card-header">
          <h5 class="mb-0"><i class="fa fa-image"></i> &nbsp; Media Uploads</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" id="logo" @change="previewLogo" class="form-control">
            <img :src="logoPreview" alt="Logo Preview" v-if="logoPreview" class="img-thumbnail mt-2"
              style="max-height: 100px;">
          </div>
          <div class="mb-3">
            <label for="favicon" class="form-label">Favicon</label>
            <input type="file" id="favicon" @change="previewFavicon" class="form-control">
            <img :src="faviconPreview" alt="Favicon Preview" v-if="faviconPreview" class="img-thumbnail mt-2"
              style="max-height: 50px;">
          </div>
        </div>
      </div>

      <div class="card shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fa fa-globe"></i> &nbsp; Social Media</h5>
          <button type="button" class="btn btn-sm btn-outline-success" @click="addSocial">+ Add Social</button>
        </div>
        <div class="card-">
          <div class="row" v-for="(social, index) in form.socials" :key="index">
            <div class="col-4 mb-2 mt-2">
              <label :for="'social-name-' + index" class="form-label">Platform Name</label>
              <input type="text" :id="'social-name-' + index" v-model="social.name" class="form-control">
            </div>
            <div class="col-4 mb-2 mt-2">
              <label :for="'social-url-' + index" class="form-label">URL</label>
              <input type="url" :id="'social-url-' + index" v-model="social.url" class="form-control">
            </div>
            <div class="col-4 mb-2 mt-2">
              <label :for="'social-icon-' + index" class="form-label">Icon</label>
              <input type="file" :id="'social-icon-' + index" @change="e => previewSocialIcon(e, index)"
                class="form-control">
              <img :src="social.iconPreview" alt="Icon Preview" v-if="social.iconPreview" class="img-thumbnail mt-2"
                style="max-height: 50px;">
            </div>
            <hr />
          </div>
        </div>
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </form>
</template>

<script setup>
  import Breadcrumb from '@/Components/Breadcrumb.vue'
  import { reactive, ref } from 'vue'

  const breadcrumb = [
    { label: 'Dashboard', url: '/admin/dashboard' },
    { label: 'Profile' }
  ]


  const form = reactive({
    name: '',
    slogan: '',
    address: '',
    contacts: [''],
    socials: [{ name: '', url: '', iconPreview: '' }]
  })

  const logoPreview = ref(null)
  const faviconPreview = ref(null)

  function previewLogo(event) {
    const file = event.target.files[0]
    if (file) {
      logoPreview.value = URL.createObjectURL(file)
    }
  }

  function previewFavicon(event) {
    const file = event.target.files[0]
    if (file) {
      faviconPreview.value = URL.createObjectURL(file)
    }
  }

  function previewSocialIcon(event, index) {
    const file = event.target.files[0]
    if (file) {
      form.socials[index].iconPreview = URL.createObjectURL(file)
    }
  }

  function addContact() {
    form.contacts.push('')
  }

  function addSocial() {
    form.socials.push({ name: '', url: '', iconPreview: '' })
  }

  function submitForm() {
    console.log(form)
  }
</script>