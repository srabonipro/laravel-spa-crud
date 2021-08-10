<template>
  <div>
    <h1>Add Category</h1>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addCategory">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="category.name" />
            <span class="text-danger" v-if="errors && errors.name">
              {{ errors.name[0] }}
            </span>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Add Category</button>
            <router-link to="/category" class="btn btn-danger"
              >Back</router-link
            >
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
      category: {},
      errors: {},
    };
  },
  methods: {
    async addCategory() {
      try {
        // console.log(this.category);
        const response = await axios.post("/api/categories", this.category);
        this.$toaster.success(response.data);
        this.category = "";
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

<style lang="scss" scoped>
</style>
