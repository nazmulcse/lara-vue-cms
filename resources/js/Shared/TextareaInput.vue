<template>
  <div>
    <validation-provider
        :name="label"
        :rules="rules"
        v-slot="validationContext"
        >
        <b-form-group :id=" 'input-group-' + id" :label="label" :label-for="id">
            <b-form-textarea
            :id="id"
            ref="input"
            :name="id"
            v-bind="$attrs"
            :placeholder="placeholder"
            :rows="rows"
            :value="value"
            v-on:input="$emit('input', $event)"
            :state="getValidationState(validationContext)"
            ></b-form-textarea>
            <b-form-invalid-feedback>{{ validationContext.errors[0] }}</b-form-invalid-feedback>
        </b-form-group>
    </validation-provider>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `textarea-input-${this._uid}`
      },
    },
    placeholder: {
      type: String,
      default: 'Select'
    },
    rows: {
      type: String,
      default: '2'
    },
    rules: {
      type: Object
    },
    value: String,
    label: String,
    error: String,
  },
  methods: {
    getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
    },
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
}
</script>
