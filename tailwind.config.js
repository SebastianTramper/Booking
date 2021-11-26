const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        screens: {
            'sm': '640px', // => @media (min-width: 640px) { ... }
            'md': '768px', // => @media (min-width: 768px) { ... }
            'lg': '992px', // => @media (min-width: 1024px) { ... }
            'xl': '1040px', // => @media (min-width: 1280px) { ... }
        },
        colors: {
            gray: '#f4f4f4',
            green: 'rgba(16, 185, 129)',
            blue:  '#6366F1',
            white: '#fff',
            red: '#EF4444'
        }
    },


    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
