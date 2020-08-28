<template>
  <div></div>
</template>

<script>
export default {
  created() {
    this.$store.dispatch("UserSingle/logout").then(() => {
      window.location.href='/login'
    });
  }
};
</script>

<style>
</style>