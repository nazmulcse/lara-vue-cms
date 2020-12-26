<template>
  <div>
    <!-- Header -->
      <admin-header/>
    <!-- Header -->
    <div class="body-content d-flex">
      <aside class="sidebar sidebar-dark sidebar-expand-md" data-navtype="accordion">
        <admin-sidebar/>
      </aside>
      <main class="main">
        <h3 class="page-header pt-2 pb-2 pl-3 pr-3 mb-0">
          <i :class="header_icon" class="mr-2 float-left border border-secondary rounded-circle p-1 text-center"></i>
          {{ page_header }}                
        </h3>
        <div class="breadcrumb-line container-fluid">
          <div class="row">
              <div class="col-sm-6">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb pl-0">
                          <li v-for="(breadcrumb, key) in breadcrumbs" :key="key" class="breadcrumb-item active" aria-current="page">
                                  
                              <inertia-link v-if="breadcrumb.url !== '#'" :href="breadcrumb.url">
                                {{ breadcrumb.title   }} 
                              </inertia-link>
                              <span v-else>
                                {{ breadcrumb.title   }} 
                              </span>
                          </li>
                      </ol>
                  </nav>
              </div>
              <div class="col-sm-6 breadcrumb-right">
                <template v-for="(button, key) in buttons">
                  <inertia-link :key="key" :href="button.url" :class="button.class" class="btn">
                                {{ button.title   }} 
                              </inertia-link>
                </template>
              </div>
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
  props: {
    header_icon: String,
    page_header: String,
    breadcrumbs: Array,
    buttons: Array
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
