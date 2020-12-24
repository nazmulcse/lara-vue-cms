<template>
  <div>
    <!-- Header -->
      <admin-header/>
    <!-- Header -->
    <div class="body-content">
      <aside class="sidebar sidebar-dark sidebar-expand-md" data-navtype="accordion">
        <admin-sidebar/>
      </aside>
      <main class="main">
        <h3 class="page-header pt-2 pb-2 pl-3 pr-3 mb-0">
          <i class="icon-meter2 mr-2 float-left border border-secondary rounded-circle p-2 text-center"></i>
          ড্যাশবোর্ড                
        </h3>
        <div class="breadcrumb-line container-fluid">
          <div class="row">
              <div class="col-sm-6">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb pl-0">
                          <li class="breadcrumb-item active" aria-current="page">
                                  ড্যাশবোর্ড
                          </li>
                      </ol>
                  </nav>
              </div>
              <div class="col-sm-6 breadcrumb-right"></div>
          </div>
        </div>
        <div class="page-content p-3">
          <slot />
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import Dropdown from '@/Shared/Dropdown'
import FlashMessages from '@/Shared/FlashMessages'
import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'
import AdminSidebar from '@/Layouts/AdminSidebar'
import AdminHeader from '@/Layouts/AdminHeader'

export default {
  components: {
    Dropdown,
    FlashMessages,
    Icon,
    Logo,
    AdminSidebar,
    AdminHeader
  },
  data() {
    return {
      showUserMenu: false,
      accounts: null,
    }
  },
  methods: {
    url() {
      return location.pathname.substr(1)
    },
    hideDropdownMenus() {
      this.showUserMenu = false
    },
  },
}
</script>
