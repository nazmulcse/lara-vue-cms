<template>
  <div class="row small text-muted">
      <div class="col-sm-4 pt-1"></div>
      <div class="col-sm-8 text-sm-right">
        <ul class="pagination" role="navigation">
          <li v-for="(link, key) in links" :key="key" class="page-item" :class="{ 'active': link.active }">
            <inertia-link v-if="link.url" class="page-link" :href="link.url">
              {{ link.label   }} 
            </inertia-link>
            <span class="page-link" v-else> {{ link.label   }}  </span>
          </li>
        </ul>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
}
</script>
