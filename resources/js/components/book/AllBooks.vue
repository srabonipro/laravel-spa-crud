<template>
  <div>
    <h3 class="text-center">All Books</h3>
    <br />
    <div class="d-flex justify-content-between mb-2">
        <form @submit.prevent="searchBook" class="form-inline">
            <input type="text" placeholder="Search" class="form-control" v-model="search">
            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
        </form>
      <router-link to="/add" class="btn btn-success">Add Book</router-link>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Author</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="book in books" :key="book.id">
          <td>{{ book.id }}</td>
          <td>{{ book.name }}</td>
          <td>{{ book.author }}</td>
          <td>{{ book.created_at }}</td>
          <td>{{ book.updated_at }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'show', params: { id: book.id } }"
                class="btn btn-secondary"
                >Show
              </router-link>
              <router-link
                :to="{ name: 'edit', params: { id: book.id } }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button class="btn btn-danger" @click="deleteBook(book.id)">
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
import axios from 'axios';
export default {
  data(){
      return {
          search: '',
      }
  },
  computed: {
    books() {
      return this.$store.getters["book/getBooks"];
    },
  },
  created() {
    this.$store.dispatch("book/loadBooks");
  },
  methods: {
    deleteBook(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete(`api/books/${id}`).then((response) => {
            this.$store.commit("book/DELETE_BOOK", id);
            Swal.fire("Deleted!", "The book has been deleted.", "success");
          });
        }
      });
    },
    searchBook(){
        // axios.get(`/api/books/search?search=${this.search}`).then(response => console.log(response))
        axios.get('/api/books/search?search='+ this.search).then((response) => {
            this.$store.commit('book/UPDATE_BOOKS',response.data)})
    },
  },
};
</script>
