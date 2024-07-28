/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      boxShadow: {
        'custom' :'0 0 10px rgba(0, 0, 0, 0.1)',
      },
      filter: {
        'invert-90': 'invert(90%)'
      },
    },
  },
  plugins: [
  ],
};

