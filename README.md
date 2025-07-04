# Laravel with Inertia Vue 

## 1. Create a New Laravel Project


laravel new
set default starter kit
php artisan serve


---

## 2. Install Inertia.js Laravel Package

composer require inertiajs/inertia-laravel

---

## 3. Create an Inertia Blade Layout

In `resources/views/app.blade.php`, add:

<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" /> <link href="{{ mix('/css/app.css') }}" rel="stylesheet" /> <script src="{{ mix('/js/app.js') }}" defer></script> @inertiaHead </head> <body> @inertia </body> </html> 

## 4. Create Inertia Middleware

php artisan inertia:middleware


## 5. In bootstrap/app.php 

->withMiddleware(function (Middleware $middleware): void {
       $middleware->web(append: [
        HandleInertiaRequests::class,
    ]);

## 6. Install Client-Side Packages

npm install @inertiajs/inertia @inertiajs/inertia-vue3 vue@next @inertiajs/progress


## 7. Update resources/js/app.js

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


## 8. Add an Inertia Route in routes/web.php

use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});


## 9. In vite.config.js

export default defineConfig({
    plugins: [
        vue(), // add this line
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});


## 10. Compile JS and CSS

npm install
npm run dev


## 11. Run the App

php artisan serve






