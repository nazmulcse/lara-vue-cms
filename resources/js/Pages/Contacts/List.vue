<template>
  <admin 
    page_header="Contacts"
    header_icon="icon-users"
    :breadcrumbs="breadcrumbs">
    <h1 class="mb-8 font-bold text-3xl">Contacts</h1>
    <div class="contact">
      <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
          <tr v-for="(contact, index) in contacts.data" :key="contact.id">
            <th scope="row">{{ index+1 }}</th>
            <td>{{ contact.first_name }}</td>
            <td>{{ contact.last_name }}</td>
            <td>{{ contact.email }}</td>
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