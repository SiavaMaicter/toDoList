<template>
  <div>APP PAGE</div>
  <div>
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
        <tfoot></tfoot>
      </table>
    </div>
  </div>
  <!-- <router-view></router-view> -->
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      todos: null,
    };
  },
  mounted() {
    axios.get("/api/todos").then((res) => {
      console.log(res);
      this.todos = res.data.todos;
    });
  },
};
</script>

<style>
</style>
