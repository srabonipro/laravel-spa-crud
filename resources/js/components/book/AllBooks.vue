<template>
    <div>
        <h3 class="text-center">All Books</h3><br/>
        <div class="text-right mb-2">
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
                        <router-link :to="{name: 'edit', params: { id: book.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        computed:{
            books(){
                return this.$store.getters['book/getBooks'];
            }
        },
        created() {
            this.$store.dispatch('book/loadBooks')
        },
        methods: {
            deleteBook(id) {
                if(confirm("Do you really want to delete?")){
                    axios.delete(`api/books/${id}`).then(response => {
                        // this.$store.commit('DELETE_BOOK',id)
                        console.log(response);

                    });
                }
            }
        }
    }
</script>
