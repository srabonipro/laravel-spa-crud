<template>
  <div>
    <h3 class="text-center">Add Book</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addBook" @keydown="bookForm.onKeydown($event)">
            <div class="form-group">
                <label>Name</label>
                <input type="text" v-model="bookForm.name" name="name" class="form-control" :class="{ 'is-invalid':bookForm.errors.has('name') }">
                <div class="text-danger" v-if="bookForm.errors.has('name')" v-html="bookForm.errors.get('name')" />
            </div>
            <div class="form-group">
                <label>Author Name</label>
                <input type="text" v-model="bookForm.author" name="author" class="form-control" :class="{ 'is-invalid':bookForm.errors.has('author') }">
                <div class="text-danger" v-if="bookForm.errors.has('author')" v-html="bookForm.errors.get('author')" />
            </div>

            <!-- <div class="form-group">
                <select v-for="category in categories" :key="category.id">
                    <option>-Select Category-</option>
                    <option value="{{ category.id }}">{{ category.name }}</option>
                </select>
            </div> -->

            <button type="submit" class="btn btn-primary"  :disabled="bookForm.busy">
                Submit
            </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {

  data: () => ({
    bookForm: new Form({
      name: '',
      author: ''
    })
  }),

  methods: {
    async addBook () {
        const response = await this.bookForm.post('/api/books')
        console.log(response)

    }
  },


  computed: {
    categories() {
      return this.$store.getters["category/getCategories"];
    },
  },
  created() {
    this.$store.dispatch("category/loadCategories");
  },
}
</script>
