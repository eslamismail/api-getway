<template>
  <div class="container">
    <div class="row max-hight">
      <div
        class="col-md-3 p-4 card room text-center"
        v-for="(item, index) in rooms"
        :key="index"
        @click="joinRoom(item.id)"
      >{{item.name}}</div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",
  computed: {
    user() {
      return this.$store.state.login.user;
    },
  },
  data() {
    return {
      rooms: [],
    };
  },
  created() {
    this.getRooms();
  },
  methods: {
    async getRooms() {
      try {
        let response = await axios.get("/rooms/public");
        this.rooms = response.data.data;
      } catch (error) {
        console.log(error);
      }
    },

    async joinRoom(id) {
      try {
        await axios.get(`/rooms/join/${id}`);
        this.$router.push(`/room/${id}`);
      } catch (error) {
        if (!error.response) {
          alert("no internet");
        } else if (error.response.status == 400) {
          let { message } = error.response.data;
          if (message == "Sorry you already joined this room before") {
            this.$router.push(`/room/${id}`);
          }
        }
      }
    },
  },
};
</script>

<style  scoped>
.container .max-hight {
  /* min-height: 100vh; */
  /* align-items: center; */
  /* justify-content: center; */
  margin-top: 2em;
}
.room {
  cursor: pointer;
}
.room:hover {
  /* background: #000;
  color: #fff; */
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
  z-index: 500;
}
</style>
