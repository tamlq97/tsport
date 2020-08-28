import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import NotFoundPage from "@/components/NotFoundPage.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: () => import("@/views/Home.vue"),
    // redirect: "/home",
    meta: {
      title: "Home Page",
      breadcrumb: "home"
    }
  },
  {
    path: "/about",
    name: "about",
    //route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "@/views/About.vue"),
    meta: {
      title: "About Page",
      breadcrumb: "about"
    }
  },
  {
    path: "/login",
    name: "login",
    component: () => import('@/views/Login.vue'),
    meta: {
      title:'Login',
      guest: true
    }
  },
  {
    path: "/register",
    name: "register",
    component: () => import('@/views/Register.vue'),
    meta: {
      title:'Register',
      guest: true
    }
  },
  {
    path: "/collection",
    name: "collection",
    redirect: "/collection/all-products/mens",
    component: () => import("@/components/HomeLayout.vue"),
    children: [
      {
        path: "/collection/:category_name/:type",
        name: "products",
        component: () => import("@/components/home/product/men/AllProductMen.vue"),
        meta: {
          title: "Products Page",
          breadcrumb: [
            { text: "collection", href: "collection" },
            { text: 'category_name', href: ":category_name" }
          ]
        }
      },
      {
        path: "/collection/:cate_type/products/:name",
        name: "product",
        component: () => import("@/components/home/product/men/Product.vue"),
        meta: {
          title: 'Product Page',
          breadcrumb: [
            { text: "collection", href: "collection" },
            { text: "base-layers", href: ":name" },
            { text: "product", href: "product" }
          ]
        }
      }
    ]
  },
  {
    path: "/cart",
    name: "cart",
    
    meta: {
      title: 'Cart',
      breadcrumb: [{ text: "cart", href: "/cart" }],
    },
    component: () => import('@/views/ShoppingCart.vue'),
  },
  {
    path: "/cart/checkout",
    name: "cart-checkout",
    
    meta: {
      title: 'Checkout',
      breadcrumb: [{ text: "cart", href: "/cart" }, { text: "checkout" }],
    },
    component: () => import('@/views/Order.vue'),
  },
  {
    path: "/user",
    name: "user",
    redirect: "/user/profile",
    beforeEnter: (to, from, next) => {
      if (sessionStorage.userLoggedIn) next()
      else {
        next({ name: 'login' })
      }
    },

    meta: {
      breadcrumb: [{ text: "user", href: "/user" }],
      requiresAuth: true
    },
    component: () => import('@/components/user/UserLayout.vue'),
    children: [
      {
        path: "product-manager",
        name: "product-manager",
        component: () => import('@/components/user/product/Manager.vue'),
        meta: {
          title: "User Home",
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "product-manager", href: "product-manager" }
          ]
        }
      }, {
        path: "profile",
        name: "user_profile",
        component: () => import('@/components/user/Profile.vue'),
        meta: {
          title: "User Profile",
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "profile", href: "profile" }
          ]
        }
      },
      {
        path: "order-manager",
        name: "order-manager",
        component: () => import('@/components/user/product/Orders.vue'),
        meta: {
          title: "Orders Manager",
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "order-manager", href: "order-manager" }
          ]
        }
      },
      {
        path: "supplier-manager",
        name: "supplier-manager",
        component: () => import('@/components/user/product/SupplierManager.vue'),
        meta: {
          title: "Supplier Manager",
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "supplier-manager", href: "supplier-manager" }
          ]
        }
      },
      {
        path: "customer-manager",
        name: "customer-manager",
        component: () => import('@/components/user/product/CustomerManager.vue'),
        meta: {
          title: "Customer Manager",
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "customer-manager", href: "customer-manager" }
          ]
        }
      },
      {
        path: "category-manager",
        name: "category-manager",
        component: () => import('@/components/user/product/CategoryManager.vue'),
        meta: {
          title: "Category Manager",
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "category-manager", href: "category-manager" }
          ]
        }
      },
      {
        path: "products/:product_id/colors/:color_id",
        name: "manager_image",
        component: () => import('@/components/user/product/ImageManager.vue'),
        meta: {
          title: "Image Management",
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "manager_image", href: "manager_image" }
          ]
        }
      },
      {
        path: "logout",
        name: "logout",
        component: () => import("@/components/user/Logout.vue"),
        meta: {
          breadcrumb: [
            { text: "user", href: "user" },
            { text: "logout", href: "logout" }
          ]
        }
      },
    ]
  },
  {
    path: "/admin",
    name: "admin",
    redirect: "/admin/dashboard",
    beforeEnter: (to, from, next) => {
      let user = JSON.parse(sessionStorage.user)
      if (user.role_name.includes('admin')) next()
      else {
        next({ name: 'user' })
      }
    },
    meta: {
      breadcrumb: [{ text: "admin", href: "/admin" }],
      requiresAuth: true
    },
    component: () => import("@/views/AdminLayout.vue"),
    children: [
      {
        path: "dashboard",
        name: "dashboard",
        component: () => import("@/views/admin/Dashboard.vue"),
        meta: {
          title: "Admin Dashboard",
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "dashboard", href: "dashboard" }
          ]
        }
      },
      {
        path: "permissions",
        name: "permissions",
        component: () => import("@/components/admin/Permission/Permissions.vue"),
        meta: {
          title: "Permission Page",
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "permissions", href: "permissions" }
          ]
        }
      },
      {
        path: "statistical",
        name: "statistical",
        component: () => import("@/views/admin/Statistical.vue"),
        meta: {
          title: "Statistical Page",
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "statistical", href: "statistical" }
          ]
        }
      },
      {
        path: "users",
        name: "users",
        component: () => import("@/components/admin/User/Users.vue"),
        meta: {
          title: "User Page",
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "users", href: "users" }
          ]
        }
      },
      {
        path: "roles",
        name: "roles",
        component: () => import("@/components/admin/role/Roles.vue"),
        meta: {
          title: "Role Page",
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "roles", href: "roles" }
          ]
        }
      },
      {
        path: "profile",
        name: "admin_profile",
        component: () => import("@/components/admin/Profile.vue"),
        meta: {
          title: "Admin Profile",
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "profile", href: "profile" }
          ]
        }
      },
      {
        path: "logout",
        name: "logout",
        component: () => import("@/components/admin/Logout.vue"),
        meta: {
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "logout", href: "logout" }
          ]
        }
      },
      {
        path: "products",
        name: "products",
        component: () => import("@/components/admin/Product/Manager.vue"),
        meta: {
          title: "Products Page",
          breadcrumb: [
            { text: "admin", href: "admin" },
            { text: "products", href: "products" }
          ]
        }
      }
    ]
  },
  {
    path: "*",
    name:'notfoundpage',
    component: NotFoundPage
  }
];

const router = new VueRouter({
  mode: "history",
  routes
});

router.beforeEach((to, from, next) => {
  const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title);
  const nearestWithMeta = to.matched.slice().reverse().find(r => r.meta && r.meta.metaTags);
  // const previousNearestWithMeta = from.matched.slice().reverse().find(r => r.meta && r.meta.metaTags);
  if (nearestWithTitle) document.title = nearestWithTitle.meta.title;

  // Remove any stale meta tags from the document using the key attribute we set below.
  Array.from(document.querySelectorAll('[data-vue-router-controlled]')).map(el => el.parentNode.removeChild(el));

  // Skip rendering meta tags if there are none.
  if (!nearestWithMeta) return next();

  // Turn the meta tag definitions into actual elements in the head.
  nearestWithMeta.meta.metaTags.map(tagDef => {
    const tag = document.createElement('meta');

    Object.keys(tagDef).forEach(key => {
      tag.setAttribute(key, tagDef[key]);
    });

    // We use this to track which meta tags we create, so we don't interfere with other ones.
    tag.setAttribute('data-vue-router-controlled', '');

    return tag;
  })
    // Add the meta tags to the document head.
    .forEach(tag => document.head.appendChild(tag));
  if (to.matched.some(record => record.meta.guest)) {
    if (sessionStorage.authToken == null && sessionStorage.userLoggedIn == null)
      next();
    else {
      let user = JSON.parse(sessionStorage.user)
      if (user.role_name.includes('admin')) {
        next({ name: 'admin' })
      }
      else next({ name: 'user' })
    }
  } else if (to.matched.some(record => record.meta.requiresAuth)) {
    if (
      sessionStorage.authToken == null &&
      sessionStorage.userLoggedIn == null
    ) {
      next({
        name: "login"
      });
    }
    else {
      next()
    }
  }
  else next()
});
export default router;
