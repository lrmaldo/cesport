import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const colors = require('tailwindcss/colors');
const plugin = require('flowbite/plugin');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],
    safelist: [
        "text-2xl",
        "text-3xl",
        {
            pattern: /bg-(red|green|blue|primary)-(100|200|300|400|500|600|700|800)/,
        },
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.blue,
                secondary: colors.red,
                accent: colors.yellow,
                // Asegurarse de incluir todos los colores de Tailwind
                ...colors,
            },
        },
    },

    plugins: [forms, typography,
        plugin({
            datatables: true, // Habilita las DataTables en Flowbite
        }),
    ],
};
