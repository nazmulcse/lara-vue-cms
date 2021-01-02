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
        <div class="text-right">
          <!-- <b-button type="submit" variant="primary">Submit</b-button> -->
          <loading-button :loading="sending" class="btn btn-primary" type="submit">Submit</loading-button>
          <b-button class="ml-2" @click="resetForm()">Reset</b-button>
        </div>
        
      </b-form>
    </validation-observer>
  </div>
</template>

<script>
import LoadingButton from '@/Shared/LoadingButton'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import TextareaInput from '@/Shared/TextareaInput'
import FileInput from '@/Shared/FileInput'

export default {
  components: {
    LoadingButton,
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
      sending: false,
      cities: [
        {id: '1', name: 'Lakshmipur'}
      ],
      contactId: this.contact ? this.contact.id : null,
      form: {
        address: this.contact ? this.contact.address : null,
        file: null,
        first_name: this.contact ? this.contact.first_name : null,
        last_name: this.contact ? this.contact.last_name : null,
        city: this.contact ? this.contact.city : null,
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
      // console.log(this.contact);
      if(this.contactId){
        this.$inertia.put(this.route('contact.update', this.contactId), this.form, {
          onStart: () => this.sending = true,
          onFinish: () => this.sending = false,
        })
      } else {
        this.$inertia.post(this.route('contact.store'), this.form, {
          onStart: () => this.sending = true,
          onFinish: () => this.sending = false,
        })
      }
      
    }
  }
};
</script>