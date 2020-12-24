<template>
    <div>
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
          <tr v-for="contact in contacts" :key="contact.id">
            <th scope="row">1</th>
            <td>{{ contact.first_name }}</td>
            <td>{{ contact.last_name }}</td>
            <td>{{ contact.email }}</td>
          </tr>
        </tbody>
        </table>
    </div>
     <p class="leading-normal">👆 These links are intended to be broken to illustrate how error handling works with Inertia.js.</p>
  </div>
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
  layout: Admin,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  props: ['contacts'],
}
</script>