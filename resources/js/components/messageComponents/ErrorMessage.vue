<template>
  <div>ОШИБКА: {{ alert.status + " - " + alert.message }}</div>
</template>

<script>
export default {
  props: ["alert"],
};
</script>

<style>
</style>
