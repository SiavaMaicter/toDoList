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
      />
      <small id="helpName" class="form-text text-muted">String name</small>
      <div v-if="v$.todo.name.$error">
        {{ v$.todo.name.$errors[0].$message }}
      </div>
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
    <div v-if="v$.todo.description.$error">
      {{ v$.todo.description.$errors[0].$message }}
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
import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";
export default {
  data() {
    return {
      v$: useVuelidate(),
      todo: null,
    };
  },
  validations() {
    return {
      todo: {
        name: { required },
        description: { required },
        deadline: { required },
      },
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
      this.submitForm();
      if (!this.v$.$error) {
        this.$store.dispatch("updateTodo", todo).then((res) => {
          this.$router.push({ name: "MainPage" });
        });
      }
    },
    async submitForm() {
      await this.v$.$validate();
    },
  },
  components: {
    VueDatePicker,
  },
};
</script>

<style>
</style>
