import index from './pages/index.vue'
import form from './pages/form.vue'

const routes = [
    {
        path: '/',
        component: index,
        name: 'index',
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
    }
];

export default routes;
