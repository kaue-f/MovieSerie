const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require("daisyui"),
      ],
      daisyui: {
        styled: true,
        themes: false,
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "dark",
      },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        '/resources/views/*/.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    theme: {
        extend: {
            colors: {
                primary: '#2563eb',
                secondary: '#0a0a0a',
            },
            textColors: {
                primary: '#5a67d8'
            },
        },
    },
    extend: {
        fontFamily: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        },
    },
};
