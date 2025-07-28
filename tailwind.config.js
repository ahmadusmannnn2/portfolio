import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // TAMBAHKAN WARNA ANDA DI SINI TANPA MENGHAPUS YANG LAIN
            colors: {
                'theme-light': '#fffae6',      // bg-color
                'theme-secondary': '#d3d5b5',  // second-bg-color
                'theme-text': '#345133',       // text-color
                'theme-main': '#698342',       // main-color
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};