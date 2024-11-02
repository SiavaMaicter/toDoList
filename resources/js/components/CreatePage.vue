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
    <small id="helpDescription" class="form-text text-muted">String text</small>
  </div>
  <button class="btn btn-primary">SUBMIT</button>
</template>

<script>
export default {
  data() {
    return {
      todo: {},
    };
  },
};
</script>

<style>
</style>
