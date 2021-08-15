<template>
<div>
    <h1>product component</h1>
    <form @submit.prevent="createProduct">
        <div class="form-group">
            <label>Name</label>
            <input type="text" v-model="productForm.name" name="name" class="form-control" :class="{ 'is-invalid':productForm.errors.has('name') }">
            <div class="text-danger" v-if="productForm.errors.has('name')" v-html="productForm.errors.get('name')" />
            <span>{{ productForm.errors[0] }}</span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea v-model="productForm.description" name="description" rows="4" class="form-control" :class="{ 'is-invalid':productForm.errors.has('description') }"></textarea>
            <div class="text-danger" v-if="productForm.errors.has('description')" v-html="productForm.errors.get('description')" />
            <span>{{ productForm.errors[0] }}</span>
        </div>
        <div class="form-group">
            <vue-dropzone
             ref="myVueDropzone"
             id="dropzone"
             :options="dropzoneOptions"
             @vdropzone-complete="afterUploadComplete"
             @vdropzone-sending-multiple="storeProduct"
             ></vue-dropzone>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <!-- <router-link to="/product" class="btn btn-danger">Back</router-link> -->
        </div>
    </form>
</div>
</template>

<script>
import Form from 'vform'
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {

    data: () => ({
        productForm: new Form({
            name: '',
            description: '',
        }),
        dropzoneOptions: {
            url: 'http://127.0.0.1:8000/api/product/store',
            thumbnailWidth: 150,
            maxFilesize: 2,
            parallelUploads: 3,
            maxFiles: 3,
            autoProcessQueue: false,
        }
    }),
    components:{
        vueDropzone: vue2Dropzone
    },
    methods:{
        afterUploadComplete:async function(res){
            if(res.status == "success"){
                console.log('upload successful');
            }else{
                console.log('upload failed');
            }
        },
        createProduct(){
            this.$refs.myVueDropzone.processQueue();
        },
        storeProduct: async function (files, xhr, formData){
            formData.append('name', this.productForm.name);
            formData.append('description', this.productForm.description);
        },
    }
}
</script>
