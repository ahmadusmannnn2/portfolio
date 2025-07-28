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
            // Ubah font sans-serif default menjadi Poppins
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'theme-light': '#fffae6',
                'theme-secondary': '#d3d5b5',
                'theme-text': '#345133',
                'theme-main': '#698342',
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};