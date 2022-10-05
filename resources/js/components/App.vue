
<template>
  <div class="content">
    <Placeholder :title="title" />
  </div>
</template>

<script>
import Placeholder from "./Placeholder.vue";
export default {
  name: "App",
  data() {
    return {
      title: "Work In Progress..",
    };
  },
  components: { Placeholder },
};
</script>

<style scoped>
</style>
