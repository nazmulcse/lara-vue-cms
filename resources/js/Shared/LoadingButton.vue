<template>
  <b-button :type="type" :variant="variant" :disabled="loading">
    <b-spinner v-if="loading" small></b-spinner>
      <slot />
  </b-button>
</template>

<script>
export default {
  props: {
    loading: Boolean,
    type: String,
    variant: String,
  },
}
</script>
