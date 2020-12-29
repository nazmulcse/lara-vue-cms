<template>
  <div>
    <validation-provider
        :name="label"
        :rules="rules"
        v-slot="validationContext"
        >
        <b-form-group :id=" 'input-group' + id" :label="label" :label-for="id">
            <b-form-input
            :id="id"
            :type="type"
            v-bind="$attrs"
            :value="value"
            :state="getValidationState(validationContext)"
            v-on:input="$emit('input', $event)"
            ></b-form-input>

            <b-form-invalid-feedback>{{ validationContext.errors[0] }}</b-form-invalid-feedback>
        </b-form-group>
    </validation-provider>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
import {
  ValidationObserver,
  ValidationProvider,
  extend,
  localize
} from "vee-validate";
import en from "vee-validate/dist/locale/en.json";
import * as rules from "vee-validate/dist/rules";
// Install VeeValidate rules and localization
Object.keys(rules).forEach(rule => {
  extend(rule, rules[rule]);
});

localize("en", en);

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
    rules: {
      type: Object
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
    getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
    },
  },
}
</script>
