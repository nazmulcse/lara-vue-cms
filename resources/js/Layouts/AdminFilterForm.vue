<template>
<div>
    <b-card no-body class="panel-theme panel-group-control filter-card mb-3">
    <div class="card-header bg-secondary text-white">
        <b-button variant="link" v-b-toggle.collapse-1 class="btn-sm btn-block p-0 text-white text-left">
            <i class="icon-filter4 mr-1" aria-hidden="true"></i> Filter
        </b-button>
    </div>
    <b-collapse id="collapse-1" class="mt-2">
        <b-card-body>
        <slot/>
        <div class="border-top pt-2">
            <div class="row">
                <div class="col-sm-7 small pt-sm-2 text-muted">
                    Choose any parameter and hit the &lsquo;Filter&rsquo; button to <em>filter</em> the result
                </div>
                <div class="col-sm-5 text-sm-right">
                    <button type="reset" @click="$emit('reset')" class="btn btn-link text-secondary btn-sm btn-clear-filter">
                        <i class="icon-cancel-circle2 mr-1" aria-hidden="true"></i> Clear Filter
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="icon-filter4 mr-1" aria-hidden="true"></i> Filter
                    </button>
                </div>
            </div>
        </div>
        </b-card-body>
    </b-collapse>
    </b-card>
</div>
</template>
<script>
export default {
    components: {
    },
    data() {
    return {
    //   showUserMenu: false,
    }
  },
  methods: {
    url() {
      return location.pathname.substr(1)
    }
  },
}
</script>