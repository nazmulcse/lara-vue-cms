<template>
  <admin 
    page_header="Contacts"
    header_icon="icon-users"
    :buttons="buttons"
    :breadcrumbs="breadcrumbs">
    <div class="card">
        <div class="card-body">
            <Form/>
        </div>
    </div>
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
import Form from './Form'

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
    Admin,
    Form
  },
  props: {
    contacts: Object
  },
}
</script>