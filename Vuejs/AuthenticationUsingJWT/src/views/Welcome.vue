
<template>
  <div>
   <h1> Welcome</h1>
    <router-link v-if="!isLoggedIn" to="/login"><button>Login</button></router-link>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["isLoggedIn"])
  }
};
</script>
