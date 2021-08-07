<template>
    <div>
        <h1>Add Category</h1>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCategory">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" v-model="category.name">
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
    export default {
        data(){
            return {
               category: {}
            }
        },
        methods:{
            addCategory(){
                this.axios.post('/api/category/add').then(response => (
                    this.$router.push({name: 'category'})
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
