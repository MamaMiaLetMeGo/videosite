/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        gold: {
          100: '#fef9e7',
          200: '#fdf3cf',
          300: '#fcecb7',
          400: '#fbe69f',
          500: '#fadf87',
          600: '#f9d86f',
          700: '#f8d157',
          800: '#f7ca3f',
          900: '#f6c327',
        },
      },
    },
  },
  plugins: [],
}