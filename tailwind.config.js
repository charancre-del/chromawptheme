module.exports = {
  content: ['./**/*.php', './assets/js/**/*.js', './docs/**/*.html'],
  theme: {
    extend: {
      colors: {
        brand: {
          ink: '#263238',
          cream: '#FFFCF8',
          navy: '#0f172a',
          slate: '#0f172a'
        },
        chroma: {
          red: '#D67D6B',
          redLight: '#F4E5E2',
          blue: '#4A6C7C',
          blueDark: '#2F4858',
          blueLight: '#E3E9EC',
          green: '#8DA399',
          greenLight: '#E3EBE8',
          yellow: '#E6BE75',
          yellowLight: '#FDF6E3',
          teal: '#0d9488',
          pink: '#be185d',
          orange: '#ea580c',
          purple: '#7c3aed',
          gold: '#ca8a04'
        }
      },
      fontFamily: {
        sans: ['Outfit', 'system-ui', 'sans-serif'],
        serif: ['Playfair Display', 'ui-serif', 'Georgia', 'serif']
      },
      boxShadow: {
        soft: '0 18px 45px rgba(15,23,42,0.16)',
        card: '0 10px 30px -5px rgba(0, 0, 0, 0.04)',
        inner: 'inset 0 2px 4px 0 rgba(255, 255, 255, 0.5)'
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
      },
      borderRadius: {
        '4xl': '2.5rem',
        '5xl': '3.5rem'
      }
    }
  },
  plugins: [require('@tailwindcss/typography')]
};
