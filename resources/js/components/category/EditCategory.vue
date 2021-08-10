<template>
  <div>
    <h3 class="text-center">Edit Category</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateCategory">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="category.name" />
          </div>
          <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      category: {},
    };
  },
  created() {
    axios.get(`/api/categories/${this.$route.params.id}`).then((response) => {
      this.category = response.data;
    });
  },
  methods: {
    updateCategory() {
      axios
        .put(`/api/categories/${this.$route.params.id}`, this.category)
        .then((response) => {
          // this.$router.push({name: 'home'});
          this.$toaster.success(response.data);
        });
    },
  },
};
</script>
