<template>
  <admin 
    :page_header="page_header"
    header_icon="icon-users"
    menu_active="contact_report"
    :buttons="buttons"
    :breadcrumbs="breadcrumbs">
    <report @reset="reset" :page_header="page_header">
      <template v-slot:parameters>
        <div class="row">
          <div class="col-sm-4">
              <text-input v-model="form.first_name" label="First Name" id="first_name" />
          </div>
          <div class="col-sm-4">
              <text-input v-model="form.last_name" label="Last Name" id="last_name" />
          </div>
          <div class="col-sm-4">
              <text-input type="email" v-model="form.email" label="Email" id="email" />
          </div>
        </div>
      </template>

      <template v-slot:report_content>
        <div class="contact">
          <table class="table table-hover table-striped mb-0">
            <thead class="bg-secondary text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('First Name') }} </th>
                <th scope="col"> {{ __('Last Name') }} </th>
                <th scope="col"> {{ __('Email') }} </th>
                <th scope="col"> {{ __('Photo') }} </th>
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
              </tr>
            </tbody>
          </table>
        </div>
      </template>
      
    </report>
    
      <!-- {{ contacts.links }} -->
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
import Report from '@/Layouts/Report'
import TextInput from '@/Shared/TextInput'

export default {
  metaInfo: { title: 'Contacts' },
  data() {
    return {
      page_header: "Contacts",
      breadcrumbs: [
        {url: "/contacts", title:"Contacts"},
        {url: "#", title:"List"}
      ],
      buttons: [
        {url: "contact.create", title:"Add Contacts", class: "btn-sm btn-primary", icon:"icon-plus3"}
      ],
      form: {
        first_name: null,
        last_name: null,
        email: null,
      }
    }
  },
  components: {
    Icon,
    Pagination,
    SearchFilter,
    Admin,
    Report,
    TextInput
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
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>