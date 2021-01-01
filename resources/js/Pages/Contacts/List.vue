<template>
  <admin 
    page_header="Contacts"
    header_icon="icon-users"
    :buttons="buttons"
    :breadcrumbs="breadcrumbs">
    <h1 class="mb-8 font-bold text-3xl">Contacts</h1>
    <div class="contact">
      <table class="table table-hover table-striped mb-0">
        <thead class="bg-secondary text-white">
            <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          <tr v-for="(contact, index) in contacts.data" :key="contact.id">
            <th scope="row">{{ index+1 }}</th>
            <td>{{ contact.first_name }}</td>
            <td>{{ contact.last_name }}</td>
            <td>{{ contact.email }}</td>
            <td>
              <div class="dropdown">
                <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" :id="contact.id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu dropdown-menu-right" :aria-labelledby="contact.id">
                </div> -->
                <div>
                  <b-dropdown size="sm" text="Action" variant="outline-secondary">
                    <inertia-link role="menuitem" class="dropdown-item" :href="route('contact.edit', contact.id)">
                        <i class="icon-pencil7"></i>
                        Edit
                    </inertia-link>
                    <b-dropdown-divider></b-dropdown-divider>
                    <b-dropdown-item href="#">Delete</b-dropdown-item>
                  </b-dropdown>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
        </table>
    </div>
      <!-- {{ contacts.links }} -->
     <pagination :links="contacts.links" />
  </admin>
</template>
<script>
import Icon from '@/Shared/Icon'
import Admin from '@/Layouts/Admin'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import pickBy from 'lodash/pickBy'
import SearchFilter from '@/Shared/SearchFilter'
import throttle from 'lodash/throttle'

export default {
  metaInfo: { title: 'Contacts' },
  data() {
    return {
      breadcrumbs: [
        {url: "/contacts", title:"Contacts"},
        {url: "#", title:"List"}
      ],
      buttons: [
        {url: "contact.create", title:"Add Contacts", class: "btn-sm btn-primary"}
      ]
    }
  },
  components: {
    Icon,
    Pagination,
    SearchFilter,
    Admin
  },
  props: {
    contacts: Object
  },
}
</script>