import {
    createRouter,
    createWebHistory
} from "vue-router";

const routes = [{
        path: '/',
        name: 'Home',
        component: () => import('../pages/userMember/Home.vue')
    },
    {
        path: '/product',
        name: 'Product',
        component: () => import('../pages/userMember/Product.vue')
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router