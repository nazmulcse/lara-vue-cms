<template>
  <div>
    <validation-provider
        :name="label"
        :rules="rules"
        v-slot="validationContext"
        >
        <b-form-group :id=" 'input-group-' + id" :label="label" :label-for="id">
            <b-form-select
            :id="id"
            ref="input"
            :name="id"
            :value-field="value_field"
            :text-field="text_field"
            :options="options"
            v-bind="$attrs"
            :value="value"
            :state="getValidationState(validationContext)"
            >
            <template #first>
              <b-form-select-option :value="null">{{ placeholder }}</b-form-select-option>
            </template>
            </b-form-select>
            <b-form-invalid-feedback>{{ validationContext.errors[0] }}</b-form-invalid-feedback>
        </b-form-group>
    </validation-provider>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
export default {
  props: {
    options: {
      type: [Object, Array],
      default() {
            return {}
        }
    },
    value_field: {
      type: String,
      default: 'id'
    },
    text_field: {
      type: String,
      default: 'name'
    },
    placeholder: {
      type: String,
      default: 'Select'
    },
    id: {
      type: String,
      default() {
        return `select-input-${this._uid}`
      },
    },
    rules: {
      type: Object
    },
    value: [String, Number, Boolean],
    label: String,
    error: String,
  },
  watch: {
    selected(selected) {
      this.$emit('input', selected)
    },
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
