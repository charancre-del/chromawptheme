/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './inc/**/*.php',
    './template-parts/**/*.php'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        serif: ['Playfair Display', 'ui-serif', 'Georgia', 'serif']
      },
      colors: {
        brand: {
          navy: '#0f172a',
          slate: '#0f172a',
          cream: '#fdfaf3'
        },
        chroma: {
          teal: '#0d9488',
          pink: '#be185d',
          orange: '#ea580c',
          purple: '#7c3aed',
          yellow: '#ca8a04'
        }
      },
      boxShadow: {
        soft: '0 18px 45px rgba(15,23,42,0.16)'
      },
      animation: {
        'float-slow': 'float 9s ease-in-out infinite',
        'float-medium': 'float 7s ease-in-out infinite'
      },
      keyframes: {
        float: {
          '0%,100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' }
        }
      }
    }
  },
  plugins: []
};
