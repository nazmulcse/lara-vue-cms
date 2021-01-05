<template>
  <admin 
    page_header="Contacts"
    header_icon="icon-users"
    menu_active="contact"
    :buttons="buttons"
    :breadcrumbs="breadcrumbs">
    <h1 class="mb-8 font-bold text-3xl">Contacts</h1>
    <div class="contact">
      <table class="table table-hover table-striped mb-0">
        <thead class="bg-secondary text-white">
            <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('First Name') }} </th>
            <th scope="col"> {{ __('Last Name') }} </th>
            <th scope="col"> {{ __('Email') }} </th>
            <th scope="col"> {{ __('Photo') }} </th>
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
              <img v-if="contact.photo" width="60" height="60" :src="'/storage/' + contact.photo" alt="">
            </td>
            <td>
              <b-dropdown size="sm" text="Action" variant="outline-secondary">
                <inertia-link role="menuitem" class="dropdown-item" :href="route('contact.edit', contact.id)">
                    <i class="icon-pencil7"></i>
                    Edit
                </inertia-link>
                <b-dropdown-divider></b-dropdown-divider>
                <button class="btn btn-link text-danger dropdown-item" type="button" @click="destroy(contact.id)">
                  <i class="icon-trash"></i>
                  Delete
                </button>
              </b-dropdown>
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
        {url: "contact.create", title:"Add Contacts", class: "btn-sm btn-primary", icon:"icon-plus3"}
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
  methods: {
    destroy(contactId) {
      if (confirm('Are you sure you want to delete this contact?')) {
        this.$inertia.delete(this.route('contact.destroy', contactId))
      }
    },
  },
}
</script>