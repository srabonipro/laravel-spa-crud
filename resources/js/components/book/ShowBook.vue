<template>
  <div>
    <div class="d-flex justify-content-end">
      <button class="btn btn-sm btn-success mx-2" @click="pdf">PDF</button>
      <button class="btn btn-sm btn-success mx-2" @click="csv">CSV</button>
      <button class="btn btn-sm btn-success mx-2" @click="excel">Excel</button>
    </div>

    <div class="card w-50 mt-2 mx-auto">
      <img
        style="max-width: 100%"
        src="https://gkwithfaisal.com/wp-content/uploads/2021/02/960x0.jpg"
        class="card-img-top"
        alt="..."
      />
      <div class="card-body">
        <h3 class="card-title">{{ book.name }}</h3>
        <span class="badge badge-danger mb-3">{{ book.author }}</span>
        <p class="card-text">
          Some quick example text to build on the card title and make up the
          bulk of the card's content.
        </p>
        <router-link to="/" class="btn btn-primary">Back</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      book: {},
    };
  },
  created() {
    axios.get(`/api/books/${this.$route.params.id}`).then((response) => {
      this.book = response.data;
    });
  },
  methods: {
    async pdf() {
      try {
        this.filedownloading = true;
        axios({
          url: "/api/books/pdf",
          //   method: "POST",
          responseType: "blob",
        })
          .then((response) => {
            var fileURL = window.URL.createObjectURL(new Blob([response.data]));
            var fileLink = document.createElement("a");
            fileLink.href = fileURL;
            fileLink.setAttribute("download", `example.pdf`);
            document.body.appendChild(fileLink);
            fileLink.click();
            this.filedownloading = false;
          })
          .catch((error) => {
            console.log(error);
            this.filedownloading = false;
          });
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
    csv() {
      console.log("csv button clicked");
    },
    excel() {
      console.log("excel button clicked");
    },
  },
};
</script>
