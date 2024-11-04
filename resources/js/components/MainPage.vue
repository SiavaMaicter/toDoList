<template>
  <div>APP PAGE</div>
  <div v-if="err.status">
    <ErrorMessage :alert="err" />
  </div>
  <router-link class="btn-primary btn" :to="{ name: 'CreatePage' }">
    Создать запись
  </router-link>
  <div v-if="todos">
    <div v-if="todos.length">
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
              <router-link
                class="btn-primary btn"
                :to="{ name: 'EditPage', params: { id: todo.id } }"
              >
                EDIT
              </router-link>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div v-else>
      <div>На данный момент записей нет</div>
      <button class="btn btn-primary">ADD NEW</button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ErrorMessage from "./messageComponents/ErrorMessage.vue";
export default {
  data() {
    return {};
  },
  async mounted() {
    await this.$store.dispatch("getTodoList");
  },
  computed: {
    todos() {
      return this.$store.getters.todos;
    },
    err() {
      return this.$store.getters.err;
    },
  },
  methods: {},
  components: {
    ErrorMessage,
  },
};
</script>

<style></style>
