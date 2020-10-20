<template >
  <div class="body">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-5">
          <form class="card shadow-lg p-4" @submit.prevent="login">
            <div class="form-group row">
              <label for="email" class="col-md-3 col-form-label">email</label>
              <div class="col-md-9">
                <input type="email" name="email" id="email" class="form-control" />
                <error v-for="(item, index) in errors.email" :error="item" :key="index" />
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-3 col-form-label">password</label>
              <div class="col-md-9">
                <input type="password" name="password" id="password" class="form-control" />
                <error v-for="(item, index) in errors.password" :error="item" :key="index" />
              </div>
            </div>
            <div class="form-grow row">
              <div class="col-12 text-center">
                <button class="btn btn-primary">login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Error from "../components/Error";
export default {
  data() {
    return {
      errors: {},
    };
  },
  components: {
    Error,
  },
  mounted() {
    //
  },
  methods: {
    async login() {
      let data = new FormData(event.target);
      try {
        let response = await axios.post("/login", data);
        this.$store.commit("login/login", response.data);
        console.log(response.data);
      } catch (error) {
        if (!error.response) {
          alert("no internet");
        } else if (error.response.status == 422) {
          this.errors = error.response.data.errors;
        }
      }
    },
  },
};
</script>



<style >
.body {
  min-height: 100vh;
  background: rgb(237, 237, 237);
  width: 100%;
  display: flex;
  align-items: center;
}
label {
  text-transform: capitalize;
}

.btn {
  text-transform: uppercase;
}
</style>
