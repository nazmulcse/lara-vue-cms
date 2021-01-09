<template>
<div>
    <b-card no-body class="panel-theme panel-group-control filter-card mb-3">
        <div class="card-header bg-secondary text-white">
            <b-button variant="link" v-b-toggle.collapse-1 class="btn-sm btn-block p-0 text-white text-left">
                <i class="icon-list-unordered mr-1" aria-hidden="true"></i> Report Parameters
            </b-button>
        </div>
        <b-collapse visible id="collapse-1" class="mt-2">
            <b-card-body>
                <slot name="parameters"></slot>
                <div class="border-top pt-2">
                    <div class="row">
                        <div class="col-sm-7 small pt-sm-2 text-muted">
                            {{ __("Choose any parameter and hit the ‘Preview’ button to generate the report") }}
                            <!-- Choose any parameter and hit the &lsquo;Filter&rsquo; button to <em>filter</em> the result -->
                        </div>
                        <div class="col-sm-5 text-sm-right">
                            <button type="reset" @click="$emit('reset')" class="btn btn-link text-secondary btn-sm btn-clear-filter">
                                <i class="icon-cancel-circle2 mr-1" aria-hidden="true"></i> Clear
                            </button>
                            <b-dropdown size="sm" text="Export" variant="outline-primary">
                                <template v-slot:button-content>
                                    <i class="icon-download mr-1"></i> Export
                                </template>
                                <inertia-link role="menuitem" class="dropdown-item" :href="route('contact.edit', 1)">
                                    <i class="icon-file-pdf mr-1"></i>
                                    Export as PDF
                                </inertia-link>
                                <inertia-link role="menuitem" class="dropdown-item" :href="route('contact.edit', 1)">
                                    <i class="icon-file-excel mr-1"></i>
                                    Export as XLS
                                </inertia-link>
                                <inertia-link role="menuitem" class="dropdown-item" :href="route('contact.edit', 1)">
                                    <i class="icon-file-word mr-1"></i>
                                    Export as DOC
                                </inertia-link>
                                <b-dropdown-divider></b-dropdown-divider>
                                <button class="btn btn-link dropdown-item" type="button" @click="destroy(contact.id)">
                                <i class="icon-printer2 mr-1"></i>
                                Print
                                </button>
                            </b-dropdown>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="icon-eye8 mr-1" aria-hidden="true"></i> Preview
                            </button>
                        </div>
                    </div>
                </div>
            </b-card-body>
        </b-collapse>
    </b-card>

    <div class="card">
        <div class="card-header">
            {{ page_header }}   
        </div>
        <div class="card-body">
            <div id="report-viewport">
                <slot name="report_content"></slot>
                <div class="alert alert-info alert-styled-left mb-0" role="alert">
                    Hit the <kbd>Preview</kbd> button to generate the report. You can also ‘Export’ the report in different formats.
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data() {
    return {
    //   showUserMenu: false,
    }
  },
  props: {
    page_header: String,
  },
  methods: {
    url() {
      return location.pathname.substr(1)
    }
  },
}
</script>