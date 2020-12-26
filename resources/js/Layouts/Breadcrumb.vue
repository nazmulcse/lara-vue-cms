<template>
    <div>
        <h3 class="page-header pt-2 pb-2 pl-3 pr-3 mb-0">
          <i class="{{ header_icon }} mr-2 float-left border border-secondary rounded-circle p-2 text-center"></i>
          {{ page_header }}             
        </h3>
        <div class="breadcrumb-line container-fluid">
          <div class="row">
              <div class="col-sm-6">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb pl-0">
                          <li class="breadcrumb-item active" aria-current="page">
                                  ড্যাশবোর্ড
                          </li>
                      </ol>
                  </nav>
              </div>
              <div class="col-sm-6 breadcrumb-right"></div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>