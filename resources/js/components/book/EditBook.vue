<template>
  <div>
    <h3 class="text-center">Edit Book</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateBook">
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
          <button type="submit" class="btn btn-primary">Update Book</button>
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
  created() {
    axios.get(`/api/books/${this.$route.params.id}`).then((response) => {
      this.book = response.data;
    });
  },
  methods: {
    async updateBook() {
      try {
        const response = await axios.put(
          `/api/books/${this.$route.params.id}`,
          this.book
        );
        this.$toaster.success(response.data);
        this.errors = {};
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
