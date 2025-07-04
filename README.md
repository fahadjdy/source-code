@author : Fahad Jadiya
@email  : fahadjdy12@gmail.com
@phone  : 7203070468

# 🚀 Laravel with Inertia.js & Vue 3 Setup Guide 

This guide walks you through setting up a new Laravel project with Inertia.js and Vue 3.

---

## ✅ 1. Create a New Laravel Project

```bash
laravel new project-name
cd project-name
php artisan serve
```

> 📦 *Make sure you have Laravel installer and PHP environment set up.*

---

## 📦 2. Install Inertia.js Server-Side Adapter

```bash
composer require inertiajs/inertia-laravel
```

---

## 🧱 3. Create an Inertia Blade Layout

Create the file `resources/views/app.blade.php` and add:

```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
```

---

## 🔐 4. Create Inertia Middleware

```bash
php artisan inertia:middleware
```

---

## 🛠️ 5. Register Middleware

In `bootstrap/app.php` (or `app/Http/Kernel.php` for Laravel 8+), register:

```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->web(append: [
        \App\Http\Middleware\HandleInertiaRequests::class,
    ]);
});
```

---

## 🎨 6. Install Client-Side Dependencies

```bash
npm install @inertiajs/inertia @inertiajs/inertia-vue3 vue@next @inertiajs/progress
```

---

## 🧩 7. Configure `resources/js/app.js`

```js
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
```

---

## 🔁 8. Add a Route to `routes/web.php`

```php
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});
```

Create the corresponding `resources/js/Pages/Home.vue` file.

---

## ⚙️ 9. Update `vite.config.js`

```js
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    vue(),
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
});
```

> 💡 Optional: Add Tailwind CSS if needed.

---

## 🛠️ 10. Compile Assets

```bash
npm install
npm run dev
```

---

## 🚀 11. Serve the Application

```bash
php artisan serve
```

Visit `http://localhost:8000` to view your Laravel + Inertia + Vue 3 application.

---

## ✅ You're All Set!

You now have a working Laravel application powered by Inertia.js and Vue 3.

---
