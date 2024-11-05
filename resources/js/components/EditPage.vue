<template>
  <title>CREATE PAGE</title>
  <div v-if="todo">
    <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <input
        type="text"
        class="form-control"
        aria-describedby="helpName"
        v-model="todo.name"
        required
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
        required
      />
    </div>
    <div class="container">
      <VueDatePicker v-model="todo.deadline" vertical required></VueDatePicker>
    </div>
    <button class="btn btn-primary" @click="updateTodo(todo)">SUBMIT</button>
    <router-link class="btn-warning btn" :to="{ name: 'MainPage' }">
      Return main
    </router-link>
  </div>
</template>

<script>
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
export default {
  data() {
    return {
      todo: null,
      validBlured: null,
    };
  },
  mounted() {
    this.$store
      .dispatch("showTodo", { id: this.$route.params.id })
      .then((data) => {
        this.todo = data;
      });
  },
  methods: {
    updateTodo(todo) {
      this.$store.dispatch("updateTodo", todo);
      this.$router.push({ name: "MainPage" });
    },
  },
  components: {
    VueDatePicker,
  },
};
</script>

<style>
</style>
