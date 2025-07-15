function toggleSidebarMenu() {
  const sidebar = document.querySelector('.pc-sidebar');
  const overlayClass = 'pc-menu-overlay';
  const activeClass = 'mob-sidebar-active';

  if (!sidebar) return;

  if (sidebar.classList.contains(activeClass)) {
    // Menu is open, remove it
    sidebar.classList.remove(activeClass);
    const overlay = sidebar.querySelector(`.${overlayClass}`);
    if (overlay) overlay.remove();
  } else {
    // Menu is closed, open it
    sidebar.classList.add(activeClass);
    const overlay = document.createElement('div');
    overlay.className = overlayClass;
    overlay.addEventListener('click', toggleSidebarMenu);
    sidebar.appendChild(overlay);
  }
}

export default { toggleSidebarMenu };
