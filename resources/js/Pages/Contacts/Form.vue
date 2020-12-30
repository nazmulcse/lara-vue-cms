<template>
  <div>
    <validation-observer ref="observer" v-slot="{ handleSubmit }">
      <b-form @submit.stop.prevent="handleSubmit(onSubmit)">
        <div class="row">
            <div class="col-sm-4">
                <text-input :rules="{ required: true }" v-model="form.first_name" label="First Name" id="first_name" />
            </div>
            <div class="col-sm-4">
                <text-input :rules="{ required: true }" v-model="form.last_name" label="Last Name" id="last_name" />
            </div>
            <div class="col-sm-4">
                <text-input type="email" :rules="{ required: true, email: true }" v-model="form.email" label="Email" id="email" />
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
                <select-input :options="districts" :rules="{ required: true }" v-model="form.district_name" label="District" id="district_name" />
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
        </div>
        <b-button type="submit" variant="primary">Submit</b-button>
        <b-button class="ml-2" @click="resetForm()">Reset</b-button>
      </b-form>
    </validation-observer>
  </div>
</template>

<script>
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'

export default {
  components: {
    TextInput,
    SelectInput
  },
  data() {
    return {
      districts: [
        {id: '1', name: 'Lakshmipur'}
      ],
      foods: [
        { value: null, text: "Choose..." },
        { value: "apple", text: "Apple" },
        { value: "orange", text: "Orange" }
      ],
      form: {
        name: '785',
        first_name: null,
        last_name: null,
        district_name: null,
        email: null
      }
    };
  },
  methods: {
    resetForm() {
      this.form = {
        name: null,
        food: null
      };

      this.$nextTick(() => {
        this.$refs.observer.reset();
      });
    },
    getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
    },
    onSubmit() {
      alert("Form submitted!");
    }
  }
};
</script>