<template>
  <div class="container-fluid">
    <div class="messages">
      <div>
        <div class="row card m-1" v-for="(item, index) in messages" :key="index">
          <div class="col-12">{{item.message}}</div>
        </div>
        <div class="d-none" id="btm">shahskjsahkjhka</div>
      </div>
    </div>
    <div class="row messaging">
      <div class="col-12">
        <input type="text" @keypress.enter="sendMessage" v-model="text" class="form-control" id />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  middleware: "auth",
  data() {
    return {
      messages: [],
      text: "",
    };
  },
  mounted() {
    let { id } = this.$route.params;
    Echo.private("room." + id).listen("NewMessage", (e) => {
      this.messages.push(e.message);
    });
    this.getMessages(id);
  },
  watch: {
    messages(oldVal, val) {
      // console.log("updated");

      let bt = document.getElementById("btm").scrollIntoView();
    },
  },
  methods: {
    async getMessages(id) {
      try {
        let response = await axios.get("/rooms/" + id);
        // console.log("sss", response);
        // this.messages = response.data.data;
        this.messages = response.data.data;
      } catch (error) {
        console.log(error);
      }
    },
    async sendMessage() {
      let element = event.target;
      let message = this.text;
      let { id } = this.$route.params;

      let data = {
        message,
        room_id: id,
      };

      try {
        let response = await axios.post("/message/create", data);
        this.text = "";
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style >
.messages {
  overflow-y: scroll;
  max-height: 87vh;
  min-height: 87vh;
  align-items: flex-end;
  /* display: flex;
  flex-direction: row; */
}
</style>
