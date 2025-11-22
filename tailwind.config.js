module.exports = {
  content: ['./**/*.php', './assets/js/**/*.js'],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#f3f6ff',
          500: '#5b7cff',
          700: '#3346b0'
        }
      }
    }
  },
  plugins: [require('@tailwindcss/typography')]
};
