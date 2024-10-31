<template>
  <div>APP PAGE</div>
  <!-- <router-view></router-view> -->
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    axios.get("/api/todos").then((res) => {
      console.log(res.data);
      this.todos = res.data.todos;
    });
  },
};
</script>

<style>
</style>
