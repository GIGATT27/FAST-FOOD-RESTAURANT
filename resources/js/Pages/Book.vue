<template>
    <Header/>
    <section class="book_section layout_padding">
        <div class="container">
          <div class="heading_container">
            <h2>
              Book A Table
            </h2>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form_container">
                <form @submit.prevent="submitForm" action="">
                  <div>
                    <input v-model="form.name" type="text" class="form-control" placeholder="Your Name" />
                  </div>
                  <div>
                    <input v-model="form.phone" type="text" class="form-control" placeholder="Phone Number" />
                  </div>
                  <div>
                    <input v-model="form.email" type="email" class="form-control" placeholder="Your Email" />
                  </div>
                  <div>
                    <select v-model="form.persons" class="form-control nice-select wide">
                        <option value="" disabled selected>How many persons?</option>
                        <option v-for="n in 10" :key="n" :value="n">{{ n }}</option>
                      </select>
                  </div>
                  <div>
                    <input v-model="form.date" type="date" class="form-control">
                  </div>
                  <div class="btn_box">
                    <button type="submit">
                      Book Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="map_container ">
                <div id="googleMap"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <Footer/>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import {defineProps} from 'vue';
import axios from 'axios';
import Header from './Header.vue';
import Footer from './Footer.vue';
import { ref } from "vue";

const form  = ref ({
    name: '',
    phone: '',
    email: '',
    persons: null,
    date: '',
});

const submitForm = () => {
  axios.post('/make-reservation', form.value)
    .then(response => {
      alert('Reservation successfully made!');
      // Optionally, reset the form
      form.value = {
        name: '',
        phone: '',
        email: '',
        persons: null,
        date: ''
      };
    })
    .catch(error => {
      console.error(error);
      alert(error.response.data.message);
    //   alert('An error occurred. Please try again.');
    });
};

</script>