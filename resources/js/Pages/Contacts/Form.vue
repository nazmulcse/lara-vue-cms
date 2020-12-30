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
        

        

        <b-button type="submit" variant="primary">Submit</b-button>
        <b-button class="ml-2" @click="resetForm()">Reset</b-button>
      </b-form>
    </validation-observer>
  </div>
</template>

<script>
import TextInput from '@/Shared/TextInput'

export default {
  components: {
    TextInput
  },
  data() {
    return {
      foods: [
        { value: null, text: "Choose..." },
        { value: "apple", text: "Apple" },
        { value: "orange", text: "Orange" }
      ],
      form: {
        name: '785',
        first_name: null,
        last_name: null,
        email: 'nazmul.sbpgc@gmail.com'
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