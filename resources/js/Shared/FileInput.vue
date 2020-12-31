<template>
  <div>
    <validation-provider
        :name="label"
        :rules="rules"
        v-slot="validationContext"
        >
        <b-form-group :id=" 'input-group-' + id" :label="label" :label-for="id">
            <b-form-file
            :id="id"
            ref="input"
            :name="id"
            v-bind="$attrs"
            :placeholder="placeholder"
            :value="value"
            v-on:input="$emit('input', $event)"
            :state="getValidationState(validationContext)"
            ></b-form-file>
            <b-form-invalid-feedback>{{ validationContext.errors[0] }}</b-form-invalid-feedback>
        </b-form-group>
    </validation-provider>
    <div v-if="errors.length" class="form-error">{{ errors[0] }}</div>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${this._uid}`
      },
    },
    placeholder: {
      type: String,
      default: 'Choose file..'
    },
    rules: {
      type: Object
    },
    value: File,
    label: String,
    accept: String,
    errors: {
      type: Array,
      default: () => [],
    },
  },
  watch: {
    value(value) {
      if (!value) {
        this.$refs.file.value = ''
      }
    },
  },
  methods: {
    getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
    },
    filesize(size) {
      var i = Math.floor(Math.log(size) / Math.log(1024))
      return (size / Math.pow(1024, i) ).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i]
    },
    browse() {
      this.$refs.file.click()
    },
    change(e) {
      this.$emit('input', e.target.files[0])
    },
    remove() {
      this.$emit('input', null)
    },
  },
}
</script>
