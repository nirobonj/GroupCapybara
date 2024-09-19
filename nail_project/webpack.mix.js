const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/swipe.js', 'public/js')  // เพิ่มบรรทัดนี้สำหรับไฟล์ swipe.js
   .css('resources/css/app.css', 'public/css');
