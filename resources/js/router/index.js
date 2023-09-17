import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/stream",
      name: "stream",
      component: () => import("../views/Stream.vue")
    }
  ],
});

export default router;
