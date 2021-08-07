// Book Componets
import AllBooks from './components/book/AllBooks.vue';
import AddBook from './components/book/AddBook.vue';
import EditBook from './components/book/EditBook.vue';

// Category Component
import AllCategory from './components/category/AllCategory.vue';
import AddCategory from './components/category/AddCategory.vue';
import EditCategory from './components/category/EditCategory.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllBooks
    },
    {
        name: 'add',
        path: '/add',
        component: AddBook
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditBook
    },
    {
        name: 'category',
        path: '/category',
        component: AllCategory
    },
    {
        name: 'category-add',
        path: '/category/add',
        component: AddCategory
    },
    {
        name: 'category-edit',
        path: '/category/edit/:id',
        component: EditCategory
    },
];
