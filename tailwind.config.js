/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#5132d9',
        'secondary': '#8153d4',
        'white': '#ecf9ff',
        'black': '#080d0d',
        'history': '#fdf328',
        'entertainment': '#ef1def',
        'sports': '#ff9a35',
        'geography': '#45a5ff',
        'science': '#14f60f',
        'tables': '#FFEBEB'
      },
      fontFamily: {
        'k2d': ['K2D', 'sans-serif'],
        'montserrat': ['Montserrat', 'sans-serif']
      }
    },
  },
  plugins: [],
}
