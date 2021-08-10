<template>
  <div>
    <h3 class="text-center">Edit Category</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateCategory">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="category.name" />
            <span class="text-danger" v-if="errors && errors.name">
              {{ errors.name[0] }}
            </span>
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
      errors: {},
    };
  },
  created() {
    axios.get(`/api/categories/${this.$route.params.id}`).then((response) => {
      this.category = response.data;
    });
  },
  methods: {
    async updateCategory() {
      try {
        const response = await axios.put(
          `/api/categories/${this.$route.params.id}`,
          this.category
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
