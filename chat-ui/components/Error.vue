<template>
  <div>
    <span class="text-danger">{{error}}</span>
  </div>
</template>
<script>
export default {
  props: {
    error: {
      type: String,
      required: true,
    },
  },
};
</script>
