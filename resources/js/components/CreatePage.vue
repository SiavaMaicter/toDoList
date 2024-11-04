<template>
  <title>CREATE PAGE</title>
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input
      type="text"
      class="form-control needs-validation"
      aria-describedby="helpName"
      v-model="todo.name"
    />
    <small id="helpName" class="form-text text-muted">String name</small>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input
      type="text"
      class="form-control needs-validation"
      aria-describedby="helpDescription"
      v-model="todo.description"
    />
  </div>
  <div class="container">
    <VueDatePicker v-model="date" vertical></VueDatePicker>
  </div>
  <button class="btn btn-primary" @click="saveTodo">SUBMIT</button>
  <router-link class="btn-warning btn" :to="{ name: 'MainPage' }">
    Return main
  </router-link>
</template>
<script setup>
import { ref } from "vue";
// Example starter JavaScript for disabling form submissions if there are invalid fields
// (function () {
//   'use strict'

//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   var forms = document.querySelectorAll('.needs-validation')

//   // Loop over them and prevent submission
//   Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//       form.addEventListener('submit', function (event) {
//         if (!form.checkValidity()) {
//           event.preventDefault()
//           event.stopPropagation()
//         }

//         form.classList.add('was-validated')
//       }, false)
//     })
// })()
</script>
<script>
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
export default {
  data() {
    return {
      date: ref(new Date()),
      todo: {},
    };
  },
  methods: {
    saveTodo() {
      this.$store.dispatch("createTodo", {
        deadline: this.date,
        todo: this.todo,
      });
      this.$router.push({ name: "MainPage" });
    },
  },
  mounted() {},
  components: {
    VueDatePicker,
  },
};
</script>

<style>
</style>
