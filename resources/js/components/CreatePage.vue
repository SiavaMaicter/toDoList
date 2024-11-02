<template>
  <title>CREATE PAGE</title>
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input
      type="text"
      class="form-control"
      aria-describedby="helpName"
      v-model="todo.name"
    />
    <small id="helpName" class="form-text text-muted">String name</small>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input
      type="text"
      class="form-control"
      aria-describedby="helpDescription"
      v-model="todo.description"
    />
  </div>
  <div class="container">
    <VueDatePicker v-model="date" vertical></VueDatePicker>
  </div>
  <button class="btn btn-primary" @click="saveTodo">SUBMIT</button>
</template>
<script setup>
import { ref } from "vue";
const date = ref(new Date());
</script>
<script>
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
export default {
  data() {
    return {
      todo: {},
    };
  },
  methods: {
    saveTodo() {
      console.log(this.$refs);
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
