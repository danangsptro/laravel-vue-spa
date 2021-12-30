import index from './pages/home.vue'
import form from './pages/form.vue'
import login from './pages/login.vue'
import product from './pages/product/index.vue'
import productCreate from './pages/product/create.vue'

const routes = [
    {
        path: '/home',
        component: index,
        name: 'home',
    },
    {
        path: '/form',
        component: form,
        name: 'form',
    },
    {
        path: '/form/:id',
        component: form,
        name: 'form',
    },
    {
        path: '/login',
        component: login,
        name: 'login',
    },
    {
        path: '/product',
        component: product,
        name: 'product',
    },
    {
        path: '/productCreate',
        component: productCreate,
        name: 'productCreate',
    }
];

export default routes;
