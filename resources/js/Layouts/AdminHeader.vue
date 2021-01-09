<template>
<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-retail py-1">
   <a class="navbar-brand" href="#">
   <img src="#" alt="Logo" class="mr-1" width="30" height="30">
   <span class="mt-1 d-inline-block"><span class="d-none d-sm-block">Lara Vue CMS</span> <span class="d-block d-sm-none" aria-hidden="true">এলজিএসপি-৩</span></span>
   </a>
   <div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-nav-collapsible" aria-controls="top-nav-collapsible" aria-expanded="false" aria-label="Toggle Top Navigation">
      <i class="icon-user" aria-hidden="true"></i>
      </button>
      <button class="navbar-toggler sidebar-toggle" type="button" aria-expanded="false" aria-label="Toggle Sidebar Menu">
      <i class="icon-three-bars" aria-hidden="true"></i>
      </button>
   </div>
   <div class="collapse navbar-collapse" id="top-nav-collapsible">
      <!-- Left Side of the Navbar -->
      <!-- Right Side of the Navbar -->
      <ul class="navbar-nav ml-auto">
         <li class="nav-item mr-md-2 mb-2 mb-md-0 text-right">
            <div class="btn-group mt-1 language-btn-group" role="group">
               <inertia-link :href="route('language', 'bn')" :class="{'active' : $page.props.locale == 'bn' }" class="btn btn-outline-light btn-sm">
                  বাংলা
               </inertia-link>
               <inertia-link :href="route('language', 'en')" :class="{'active' : $page.props.locale == 'en' }" class="btn btn-outline-light btn-sm">
                  English
               </inertia-link>
            </div>
         </li>
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
              <em>
            <i class="icon-user mr-1" aria-hidden="true"></i>
            <strong>Nazmul Hasan</strong>
            </em>
          </template>
          <b-dropdown-item href="#">Profile</b-dropdown-item>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </ul>
   </div>
</nav>
</template>
<script>
import Dropdown from '@/Shared/Dropdown'
export default {
    components: {
        Dropdown
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