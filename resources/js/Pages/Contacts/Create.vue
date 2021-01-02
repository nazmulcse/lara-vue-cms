<template>
  <admin 
    page_header="Contacts"
    header_icon="icon-users"
    menu_active="contact"
    :buttons="buttons"
    :breadcrumbs="breadcrumbs">
    <div class="card">
        <div class="card-body">
            <Form :contact="contact"/>
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
        {url: "contact.list", title:"Contacts List", class: "btn-sm btn-primary", icon:"icon-list-unordered"}
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
    contact: Object,
    default: null,
  },
}
</script>