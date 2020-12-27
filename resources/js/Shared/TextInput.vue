<template>
  <div>
    <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
    <input :id="id" ref="input" v-bind="$attrs" class="form-input" :class="{ error: error }" :type="type" :value="value" @input="$emit('input', $event.target.value)">
    <div v-if="error" class="form-error">{{ error }}</div>

    <validation-provider
        name="First Name"
        :rules="{ required: true, min: 3 }"
        v-slot="validationContext"
        >
        <b-form-group id="example-input-group-1" label="First Name" label-for="example-input-1">
            <b-form-input
            id="example-input-1"
            name="example-input-1"
            v-model="form.name"
            :state="getValidationState(validationContext)"
            aria-describedby="input-1-live-feedback"
            ></b-form-input>

            <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
        </b-form-group>
    </validation-provider>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${this._uid}`
      },
    },
    type: {
      type: String,
      default: 'text',
    },
    value: String,
    label: String,
    error: String,
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end)
    },
  },
}
</script>
