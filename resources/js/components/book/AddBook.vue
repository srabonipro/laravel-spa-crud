<template>
  <div>
    <h3 class="text-center">Add Book</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addBook">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="book.name" />
            <span class="text-danger" v-if="errors && errors.name">
              {{ errors.name[0] }}
            </span>
          </div>
          <div class="form-group">
            <label>Author</label>
            <input type="text" class="form-control" v-model="book.author" />
            <span class="text-danger" v-if="errors && errors.author">
              {{ errors.author[0] }}
            </span>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Add Book</button>
            <router-link to="/" class="btn btn-danger">Back</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      book: {},
      errors: {},
    };
  },
  methods: {
    async addBook() {
      try {
        // console.log(this.book.author, this.book.name);
        const response = await axios.post("/api/books", this.book);
        this.$toaster.success(response.data);
        this.book = "";
        this.errors = {};
        // console.log(response);
        // this.$router.push({name: 'home'})
      } catch (error) {
        if (error.response.status == 422) {
          this.errors = error.response.data.errors;
        }
        console.log(error);
      }
    },
  },
};
</script>
