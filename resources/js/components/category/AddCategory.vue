<template>
  <div>
    <h1>Add Category</h1>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addCategory" @keydown="categoryForm.onKeydown($event)">
            <div class="form-group">
                <label>Name</label>
                <input type="text" v-model="categoryForm.name" name="name" class="form-control" :class="{ 'is-invalid':categoryForm.errors.has('name') }">
                <div class="text-danger" v-if="categoryForm.errors.has('name')" v-html="categoryForm.errors.get('name')" />
                <span>{{ categoryForm.errors[0] }}</span>
            </div>
          <div>
            <button type="submit" class="btn btn-primary">Add Category</button>
            <router-link to="/category" class="btn btn-danger">Back</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {

  data: () => ({
    categoryForm: new Form({
      name: '',
    })
  }),

  methods: {
    async addCategory() {
        try {
            const response = await axios.post("/api/categories", this.categoryForm);

        } catch (error) {
            console.log(error.response.data.errors.name[0])
        }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
