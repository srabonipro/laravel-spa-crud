<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h1 class="text-secondary my-5">Laravel & Vue CRUD</h1>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Books</router-link>
                    <router-link to="/category" class="nav-item nav-link">Categories</router-link>
                    <router-link to="/product/add" class="nav-item nav-link">Products</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>
