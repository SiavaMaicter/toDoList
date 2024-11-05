<template>
  <title>CREATE PAGE</title>
  <div class="col-md-4">
    <label class="form-label">Name</label>
    <input
      type="text"
      @blur="v$.todo.name.$touch"
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
    <label class="form-label">Description</label>
    <input
      type="text"
      @blur="v$.todo.name.$touch"
      class="form-control"
      aria-describedby="helpDescription"
      v-model="todo.description"
    />
  </div>
  <div v-if="v$.todo.description.$error">
    {{ v$.todo.description.$errors[0].$message }}
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
import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";
export default {
  data() {
    return {
      v$: useVuelidate(),
      date: ref(new Date()),
      todo: {
        name: null,
        description: null,
      },
    };
  },
  validations() {
    return {
      todo: {
        name: { required },
        description: { required },
      },
      date: { required },
    };
  },
  methods: {
    saveTodo() {
      this.submitForm();
      if (!this.v$.$error) {
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
      } else {
        return false;
      }
    },
    async submitForm() {
      await this.v$.$validate();
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
