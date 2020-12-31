<template>
  <div>
    <div v-if="$page.props.flash.success && show" class="alert alert-success alert-styled-left mb-3" role="alert">
        <button @click="show = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            {{ $page.props.flash.success }}
    </div>
    <div v-if="$page.props.flash.error && show" class="alert alert-danger alert-styled-left mb-3" role="alert">
        <button @click="show = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="mb-0">
            {{ $page.props.flash.error }}
        </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: true,
    }
  },
  watch: {
    '$page.props.flash': {
      handler() {
        this.show = true
      },
      deep: true,
    },
  },
}
</script>
