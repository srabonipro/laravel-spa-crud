<template>
  <div>
    <h1>All Categories</h1>
    <div>
      <router-link to="/category/add" class="btn btn-success"
        >Add Category</router-link
      >
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="category in categories" :key="category.id">
          <td>{{ category.id }}</td>
          <td>{{ category.name }}</td>
          <td>{{ category.created_at }}</td>
          <td>{{ category.updated_at }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'category-edit', params: { id: category.id } }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button
                class="btn btn-danger"
                @click="deleteCategory(category.id)"
              >
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  computed: {
    categories() {
      return this.$store.getters["category/getCategories"];
    },
  },
  created() {
    this.$store.dispatch("category/loadCategories");
  },
  methods: {
    deleteCategory(id) {
      if (confirm("Do you really want to delete?")) {
        axios.delete(`/api/categories/${id}`).then((response) => {
          this.$store.commit("category/DELETE_CATEGORY", id);
          this.$toaster.success(response.data);
        });
      }
    },
  },
};
</script>
