<template>
  <div>
    <validation-observer ref="observer" v-slot="{ handleSubmit }">
      <b-form @submit.stop.prevent="handleSubmit(onSubmit)">
        <div class="row">
            <div class="col-sm-4">
                <text-input :rules="{ required: false }" :error="$page.props.errors.first_name"  v-model="form.first_name" label="First Name" id="first_name" />
            </div>
           <!--  <div class="col-sm-4">
                <div class="invalid-feedback test" v-if="$page.props.errors.first_name">{{ $page.props.errors.first_name }}</div>

            </div> -->
            <div class="col-sm-4">
                <text-input :rules="{ required: false }" :error="$page.props.errors.last_name" v-model="form.last_name" label="Last Name" id="last_name" />
            </div>
            <div class="col-sm-4">
                <text-input type="email" :rules="{ required: false, email: true }" v-model="form.email" label="Email" id="email" />
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
                <textarea-input placeholder="Enter your address" :rules="{ required: false }" :error="$page.props.errors.address" v-model="form.address" label="Address" id="address" />
            </div>
            <div class="col-sm-4">
                <select-input :options="cities" :rules="{ required: false }" v-model="form.city" label="City" id="city" />
            </div>
            <div class="col-sm-4">
                <file-input :rules="{ required: false }" v-model="form.file" label="Photo" id="photo" />
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
import TextareaInput from '@/Shared/TextareaInput'
import FileInput from '@/Shared/FileInput'

export default {
  components: {
    TextInput,
    SelectInput,
    TextareaInput,
    FileInput
  },
  props: {
    contact: Object,
  },
  data() {
    return {
      cities: [
        {id: '1', name: 'Lakshmipur'}
      ],
      form: {
        address: null,
        file: null,
        first_name: this.contact ? this.contact.first_name : null,
        last_name: this.contact ? this.contact.last_name : null,
        city: null,
        email: this.contact ? this.contact.email : null,
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
      console.log(this.contact);
      /* this.$inertia.post(this.route('contact.store'), this.form, {
        onStart: () => this.sending = true,
        onFinish: () => this.sending = false,
      }) */
    }
  }
};
</script>