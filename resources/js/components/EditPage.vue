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
    <!-- <div class="container">
      <VueDatePicker v-model="date" vertical></VueDatePicker>
    </div> -->
    <!-- <button class="btn btn-primary" @click="saveTodo">SUBMIT</button> -->
    <router-link class="btn-warning btn" :to="{ name: 'MainPage' }">
      Return main
    </router-link>
  </div>
</template>

<script>
export default {
  data() {
    return {
      todo: null,
    };
  },
  mounted() {
    this.$store
      .dispatch("showTodo", { id: this.$route.params.id })
      .then((data) => {
        this.todo = data;
      });
  },
};
</script>

<style>
</style>
