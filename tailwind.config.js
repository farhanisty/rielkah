/** @type {import('tailwindcss').Config} */
export default {
 content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      sans: ['Open Sans', 'sans-serif'],
    },
    container: {
     center: true,
     padding: ".5rem",
    },
    extend: {},
  },
  plugins: [],
}

