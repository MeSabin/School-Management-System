/** @type {import('tailwindcss').Config} */
export default {
  prefix: 'tw-',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      boxShadow: {
        'custom' :'0 0 10px rgba(0, 0, 0, 0.1)',
        'custom_1' : '0 2px 13px rgba(0, 0, 0, 0.3)',
      },
      filter: {
        'invert-90': 'invert(90%)'
      },
    },
  },
  plugins: [
    
  ],
};

