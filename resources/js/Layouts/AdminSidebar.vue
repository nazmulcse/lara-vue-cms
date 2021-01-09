<template>
  <div class="sidebar-content vh-100">
    <nav class="sidebar-nav">
      <ul class="nav flex-column nav-pills">
        <li class="nav-item has-submenu b-nav-dropdown dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:">
                <i class="icon-puzzle3" aria-hidden="true"></i>
                <span>মিটিং ট্র্যাকার</span>
            </a>
            <ul class="submenu" data-submenu-title="মিটিং ট্র্যাকার">
                <li>
                    <a class="dropdown-item " href="#">
                        মিটিং ট্র্যাকার (ইউপি)
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
          <inertia-link showProgress="true" class="nav-link" :class="{ 'active': menu_active === 'contact' }" :href="route('contact.list')">
            <i class="icon-users" aria-hidden="true"></i>
                <span>Contacts</span>
          </inertia-link>
        </li>

        <li class="nav-item has-submenu b-nav-dropdown dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:">
                <i class="icon-file-text" aria-hidden="true"></i>
                <span>Reports</span>
            </a>
            <ul class="submenu" data-submenu-title="Contacts">
                <li>
                    <inertia-link showProgress="true" class="dropdown-item" :class="{ 'active': menu_active === 'contact_report' }" :href="route('contact.report.create')">
                          <span>Contacts</span>
                    </inertia-link>
                </li>
            </ul>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
  mounted() {
    // link : https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav_dropdown
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("has-submenu");
    var dropdownContent = document.getElementsByClassName("submenu");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      /* if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      } */
      });
    }
  },
  components: {
    Icon,
  },
  props: {
    url: String,
    menu_active: String,
  },
  methods: {
    isUrl(...urls) {
      if (urls[0] === '') {
        return this.url === ''
      }

      return urls.filter(url => this.url.startsWith(url)).length
    },
  },
}
</script>
<style scoped>
.sidebar-dark {
    background-color: #3f474e;
}
</style>