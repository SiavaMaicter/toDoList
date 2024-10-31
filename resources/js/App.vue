<template>
  <div>APP PAGE</div>
  <div v-if="err">
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
  <!-- <router-view></router-view> -->
</template>

<script>
import axios from "axios";
import ResponseAllertVue from "./components/messageComponents/ResponseAllert.vue";
export default {
  data() {
    return {
      todos: null,
      err: {},
    };
  },
  mounted() {
    axios
      .get("/api/todos")
      .then((res) => {
        console.log(res);
        this.todos = res.data.todos;
      })
      .catch((err) => {
        this.err.message = err.response.data;
        this.err.status = err.response.status;
      });
  },
  components: {
    ResponseAllertVue,
  },
};
</script>

<style>
</style>
