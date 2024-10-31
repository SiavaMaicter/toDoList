<template>
  <div>APP PAGE</div>
  <div v-if="err.status">
    <ResponseAllertVue :alert="err" />
  </div>
  <div v-if="todos">
    <div class="table-responsive">
      <table
        class="table table-striped table-hover table-borderless table-primary align-middle"
      >
        <thead class="table-light">
          <caption>
            TODO LIST
          </caption>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr v-for="todo in todos" :key="todo.id">
            <td>
              {{ todo.id }}
            </td>
            <td>
              {{ todo.name }}
            </td>
            <td>
              {{ todo.description }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ResponseAllertVue from "./messageComponents/ResponseAllert.vue";
export default {
  data() {
    return {};
  },
  mounted() {
    this.$store.dispatch("getTodoList");
  },
  computed: {
    todos() {
      return this.$store.getters.todos;
    },
    err() {
      return this.$store.getters.err;
    },
  },
  components: {
    ResponseAllertVue,
  },
};
</script>

<style>
</style>
