<template>
  <title>CREATE PAGE</title>
  <form class="row g-3 needs-validation was-validated" novalidate>
    <div class="col-md-4">
      <label class="form-label">Name</label>
      <input
        type="text"
        class="form-control"
        aria-describedby="helpName"
        v-model="todo.name"
      />
      <small id="helpName" class="form-text text-muted">String name</small>
      <div class="invalid-feedback">Looks bad!</div>
      <div class="valid-feedback">Looks good!</div>
    </div>
  </form>
  <div class="mb-3">
    <label class="form-label invalid">Description</label>
    <input
      type="text"
      class="form-control needs-validation"
      aria-describedby="helpDescription"
      v-model="todo.description"
    />
  </div>
  <div class="container">
    <VueDatePicker v-model="date" vertical required></VueDatePicker>
  </div>
  <button class="btn btn-primary" @click="saveTodo">SUBMIT</button>
  <router-link class="btn-warning btn" :to="{ name: 'MainPage' }">
    Return main
  </router-link>
</template>
<script setup>
import { ref } from "vue";
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
    validate() {},
    saveTodo() {
      this.validate();
      this.$store
        .dispatch("createTodo", {
          deadline: this.date,
          todo: this.todo,
        })
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  mounted() {},
  components: {
    VueDatePicker,
  },
  computed: {
    err() {
      return this.$store.getters.err;
    },
  },
};
</script>

<style>
</style>
