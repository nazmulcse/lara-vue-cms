<template>
  <div>
    <validation-observer ref="observer" v-slot="{ handleSubmit }">
      <b-form @submit.stop.prevent="handleSubmit(onSubmit)">
        <div class="row">
            <div class="col-sm-4">
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
            <div class="col-sm-4">
              <validation-provider name="Food" :rules="{ required: true }" v-slot="validationContext">
                <b-form-group id="example-input-group-2" label="Food" label-for="example-input-2">
                    <b-form-select
                    id="example-input-2"
                    name="example-input-2"
                    v-model="form.food"
                    :options="foods"
                    :state="getValidationState(validationContext)"
                    aria-describedby="input-2-live-feedback"
                    ></b-form-select>

                    <b-form-invalid-feedback id="input-2-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                </b-form-group>
              </validation-provider>
            </div>
            <div class="col-sm-4">
                <validation-provider rules="required" v-slot="{ errors }">
                    <input v-model="value" name="myinput" type="text" class="is-invalid" />
                    <div>{{ errors[0] }}</div>
                </validation-provider>
            </div>
        </div>
        

        

        <b-button type="submit" variant="primary">Submit</b-button>
        <b-button class="ml-2" @click="resetForm()">Reset</b-button>
      </b-form>
    </validation-observer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      foods: [
        { value: null, text: "Choose..." },
        { value: "apple", text: "Apple" },
        { value: "orange", text: "Orange" }
      ],
      form: {
        name: null,
        food: null
      }
    };
  },
  methods: {
    getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
    },
    resetForm() {
      this.form = {
        name: null,
        food: null
      };

      this.$nextTick(() => {
        this.$refs.observer.reset();
      });
    },
    onSubmit() {
      alert("Form submitted!");
    }
  }
};
</script>