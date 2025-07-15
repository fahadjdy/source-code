<template>
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="../dashboard/index.html" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="../../../../public/assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item" >
                        <Link :href="'dashboard'" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-home"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                        </Link>
                    </li>
                    <li class="pc-item">
                        <Link :href="'profile'" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user"></i></span>
                        <span class="pc-mtext">Profile</span>
                        </Link>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Master</label>
                        <i class="ti ti-brand-chrome"></i>
                    </li>

                    <li class="pc-item pc-hasmenu" @click="subMenu">
                        <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
                                class="pc-mtext">Menu
                                levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
                            <li class="pc-item pc-hasmenu" @click="subMenu">
                                <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i
                                            data-feather="chevron-right"></i></span></a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                    <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                    <li class="pc-item pc-hasmenu" @click="subMenu">
                                        <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                                                    data-feather="chevron-right"></i></span></a>
                                        <ul class="pc-submenu">
                                            <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                            <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="pc-item pc-hasmenu" @click="subMenu" >
                                <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i
                                            data-feather="chevron-right"></i></span></a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                    <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                    <li class="pc-item pc-hasmenu" @click="subMenu">
                                        <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                                                    data-feather="chevron-right"></i></span></a>
                                        <ul class="pc-submenu">
                                            <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                            <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="pc-item">
                        <a href="../other/sample-page.html" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
                            <span class="pc-mtext">Sample page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link , router ,usePage } from '@inertiajs/vue3'
import { onMounted, watch } from 'vue'
import { route } from 'ziggy-js'

function menu_click() {
  const url = window.location.href.split(/[?#]/)[0];
  const sidebar = document.querySelector('.pc-sidebar');

  // Remove previous active states
  sidebar.querySelectorAll('.active, .pc-trigger').forEach(el => el.classList.remove('active', 'pc-trigger'));
  sidebar.querySelectorAll('.pc-submenu').forEach(el => el.style.display = 'none');

  // Activate current link and its parent hierarchy
  sidebar.querySelectorAll('.pc-navbar a').forEach(link => {
    if (link.href === url && link.getAttribute('href') !== '') {
      let li = link.closest('li');
      while (li) {
        li.classList.add('active', 'pc-trigger');
        li.querySelector('.pc-submenu')?.style && (li.querySelector('.pc-submenu').style.display = 'block');
        li = li.parentElement.closest('li');
      }
    }
  });
}

const slideUp = (el, duration = 200) => {
  el.style.transition = `height ${duration}ms, margin ${duration}ms, padding ${duration}ms`;
  el.style.boxSizing = 'border-box';
  el.style.height = el.offsetHeight + 'px';
  el.offsetHeight;
  el.style.overflow = 'hidden';
  el.style.height = 0;
  el.style.padding = 0;
  el.style.margin = 0;
};

const slideDown = (el, duration = 200) => {
  el.style.removeProperty('display');
  let display = getComputedStyle(el).display;
  if (display === 'none') display = 'block';
  el.style.display = display;

  const height = el.offsetHeight;
  el.style.height = 0;
  el.offsetHeight;
  el.style.transition = `height ${duration}ms, margin ${duration}ms, padding ${duration}ms`;
  el.style.height = height + 'px';

  setTimeout(() => {
    el.style.removeProperty('height');
    el.style.removeProperty('overflow');
    el.style.removeProperty('transition');
  }, duration);
};

function subMenu(event) {
  event.stopPropagation();

  const parent = event.currentTarget;
  const isTrigger = parent.classList.contains('pc-trigger');
  const submenu = parent.querySelector('.pc-submenu');

  // Close all siblings
  const siblings = parent.parentElement.querySelectorAll('.pc-hasmenu');
  siblings.forEach(sib => {
    if (sib !== parent) {
      sib.classList.remove('pc-trigger');
      const sibSubmenu = sib.querySelector('.pc-submenu');
      if (sibSubmenu) slideUp(sibSubmenu, 200);
    }
  });

  // Toggle current
  if (isTrigger) {
    parent.classList.remove('pc-trigger');
    submenu && slideUp(submenu, 200);
  } else {
    parent.classList.add('pc-trigger');
    submenu && slideDown(submenu, 200);
  }
}

watch(() => usePage().url, () => {
    console.log("mounted", usePage());
    menu_click(); // on change url menu should selected
})

onMounted(() => {
  menu_click(); // on load menu should selected 
})
</script>