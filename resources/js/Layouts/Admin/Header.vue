<script setup>
import { Link, router, usePage } from '@inertiajs/vue3'
import { onMounted , onBeforeUnmount } from 'vue'

import { route } from 'ziggy-js'
import { faUser } from '@fortawesome/free-solid-svg-icons'
const page = usePage()

const logout = () => {
  router.post('/logout')
}



// import { slideToggle} from './helpers/sidebar';
function sidebarHide() {
  const sidebar = document.querySelector('.pc-sidebar')
  if (!sidebar) return
  sidebar.classList.toggle('pc-sidebar-hide')
}
function rm_menu() {
  const sidebar = document.querySelector('.pc-sidebar');
  const topbar = document.querySelector('.topbar');

  sidebar?.classList.remove('mob-sidebar-active');
  topbar?.classList.remove('mob-sidebar-active');

  sidebar?.querySelector('.pc-menu-overlay')?.remove();
  topbar?.querySelector('.pc-menu-overlay')?.remove();
}


function cleanupSidebarOnResize() {
  const sidebar = document.querySelector('.pc-sidebar');
  const topbar = document.querySelector('.topbar');

  if (window.innerWidth >= 992) { // desktop breakpoint
    sidebar?.classList.remove('mob-sidebar-active');
    topbar?.classList.remove('mob-sidebar-active');

    sidebar?.querySelector('.pc-menu-overlay')?.remove();
    topbar?.querySelector('.pc-menu-overlay')?.remove();
  }
}

function mobileCollapse() {

  var temp_sidebar = document.querySelector('.pc-sidebar');
  if (temp_sidebar) {
    if (document.querySelector('.pc-sidebar').classList.contains('mob-sidebar-active')) {
      rm_menu();
    } else {
      document.querySelector('.pc-sidebar').classList.add('mob-sidebar-active');
      document.querySelector('.pc-sidebar').insertAdjacentHTML('beforeend', '<div class="pc-menu-overlay"></div>');
      document.querySelector('.pc-menu-overlay').addEventListener('click', function () {
        rm_menu();
      });
    }
  }
}

function viewMainSite(){
  window.open(location.origin, '_blank');
}

onMounted(() => {
  
  cleanupSidebarOnResize(); // check once on page load
  window.addEventListener('resize', cleanupSidebarOnResize);

})

onBeforeUnmount(() => {
  window.removeEventListener('resize', cleanupSidebarOnResize);
})
</script>

<template>
  <header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <!-- ======= Menu collapse Icon ===== -->
          <li class="pc-h-item pc-sidebar-collapse">
            <button type="button" class="pc-head-link ms-0" id="sidebar-hide" @click="sidebarHide">
              <i class="ti ti-menu-2"></i>
            </button>

          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <button type="button" class="pc-head-link ms-0" id="mobile-collapse" @click="mobileCollapse">
              <i class="ti ti-menu-2"></i>
            </button>
          </li>
        </ul>
      </div>
      <!-- [Mobile Media Block end] -->
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li @click="viewMainSite" class="pc-h-item mr-2 flex items-center cursor-pointer transition-all duration-200 hover:text-primary-600 hover:bg-gray-100 px-3 rounded-md">
            <i class="ti ti-world text-3xl mr-1"></i>
            View Site
          </li>
          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
              <img src="../../../../public/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
              <span v-text="usePage().props.auth.user.name"></span>
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <div class="d-flex mb-1">
                  <div class="flex-shrink-0">
                    <img src="../../../../public/assets/images/user/avatar-2.jpg" alt="user-image"
                      class="user-avtar wid-35">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1" v-text="usePage().props.auth.user.name"></h6>
                    <span v-text="usePage().props.auth.user.email"></span>
                  </div>
                  <a  @click.prevent="logout" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a>
                </div>
              </div>
              <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="drp-t1" data-bs-toggle="tab" data-bs-target="#drp-tab-1"
                    type="button" role="tab" aria-controls="drp-tab-1" aria-selected="true"><i class="ti ti-user"></i>
                    Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="drp-t2" data-bs-toggle="tab" data-bs-target="#drp-tab-2" type="button"
                    role="tab" aria-controls="drp-tab-2" aria-selected="false"><i class="ti ti-settings"></i>
                    Setting</button>
                </li>
              </ul>
              <div class="tab-content" id="mysrpTabContent">
                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1"
                  tabindex="0">
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-edit-circle"></i>
                    <span>Edit Profile</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-user"></i>
                    <span>View Profile</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-clipboard-list"></i>
                    <span>Social Profile</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-wallet"></i>
                    <span>Billing</span>
                  </a>
                   <a @click.prevent="logout" href="#" class="dropdown-item">
                      <i class="ti ti-power"></i>
                      <span>Logout</span>
                    </a>
                </div>
                <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-help"></i>
                    <span>Support</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-user"></i>
                    <span>Account Settings</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-lock"></i>
                    <span>Privacy Center</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-messages"></i>
                    <span>Feedback</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ti ti-list"></i>
                    <span>History</span>
                  </a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
</template>
