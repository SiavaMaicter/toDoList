<template>
  <title>CREATE PAGE</title>
  <b-form>
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input
        type="text"
        class="form-control needs-validation"
        aria-describedby="helpName"
        v-model="todo.name"
      />
      <small id="helpName" class="form-text text-muted">String name</small>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
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
  </b-form>
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
