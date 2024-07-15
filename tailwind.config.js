/** @type {import('tailwindcss').Config} */
module.exports = {
    plugins: [
        require('flowbite/plugin')
    ],

    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
      './node_modules/flowbite/**/*.js',
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require('flowbite/plugin'),
    ],
  }
