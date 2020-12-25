<template>
  <div class="row small text-muted">
      <div class="col-sm-4 pt-1"></div>
      <div class="col-sm-8 text-sm-right">
        <ul class="pagination" role="navigation">
          <template v-for="(link, key) in links">
            <li class="page-item" :class="{ 'active': link.active }">
              <inertia-link :key="key" class="page-link" :href="link.url">
                {{ link.label   }} 
              </inertia-link>
            </li>
          </template>
          
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
