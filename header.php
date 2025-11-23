<?php
/**
 * Header template containing the meta and global assets from the provided static HTML.
 *
 * @package chroma
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <title>Chroma | Prismpath™ Early Learning</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Chroma Early Learning Academy blends the Prismpath™ approach with modern spaces, premium care, and kindergarten readiness across Metro Atlanta." />
  <meta name="robots" content="index,follow" />
  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Chroma | Prismpath™ Early Learning" />
  <meta property="og:description" content="Premium childcare and early learning powered by the Prismpath™ approach across Metro Atlanta." />
  <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>" />
  <meta property="og:site_name" content="Chroma Early Learning Academy" />
  <meta property="og:image" content="<?php echo esc_url(home_url('/og-image.jpg')); ?>" />
  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Chroma | Prismpath™ Early Learning" />
  <meta name="twitter:description" content="Premium childcare and early learning powered by the Prismpath™ approach across Metro Atlanta." />
  <link rel="canonical" href="<?php echo esc_url(home_url('/')); ?>" />
  <!-- Favicon (replace href paths as needed) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(home_url('/favicon-32x32.png')); ?>" />
  <link rel="apple-touch-icon" href="<?php echo esc_url(home_url('/apple-touch-icon.png')); ?>" />
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Outfit', 'system-ui', 'sans-serif'],
            serif: ['Playfair Display', 'ui-serif', 'Georgia', 'serif'],
          },
          colors: {
            brand: {
              ink: '#263238',
              cream: '#FFFCF8',
              navy: '#0f172a',
              slate: '#0f172a',
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
          boxShadow: {
            soft: '0 18px 45px rgba(15,23,42,0.16)'
          },
          animation: {
            'float-slow': 'float 9s ease-in-out infinite',
            'float-medium': 'float 7s ease-in-out infinite',
          },
          keyframes: {
            float: {
              '0%,100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-10px)' }
            }
          }
        }
      }
    }
  </script>
  <!-- Global Styles -->
  <style>
    body {
      font-family: 'Outfit', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .nav-glass { backdrop-filter: blur(20px); background: linear-gradient(to bottom, rgba(255, 255, 255, 0.94), rgba(255, 255, 255, 0.9)); }
    .reveal { opacity: 0; transform: translateY(26px); transition: opacity 0.7s ease-out, transform 0.7s ease-out; }
    .reveal.active { opacity: 1; transform: translateY(0); }
    .prism-mask { -webkit-mask-image: radial-gradient(circle at 10% 0%, black 30%, transparent 62%); mask-image: radial-gradient(circle at 10% 0%, black 30%, transparent 62%); }
    .timeline-node.active { background-color: rgba(15, 23, 42, 0.98); color: #ffffff; border-color: #e5e7eb; box-shadow: 0 8px 30px rgba(15, 23, 42, 0.4); }
    .age-btn-active { background-color: rgba(15, 23, 42, 0.95); color: #ffffff !important; border-color: #e5e7eb; }
  </style>
  <!-- Organization Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ChildCare",
    "name": "Chroma Early Learning Academy",
    "url": "<?php echo esc_url(home_url('/')); ?>",
    "logo": "<?php echo esc_url(home_url('/logo.png')); ?>",
    "sameAs": [
      "https://www.facebook.com/chromaearlylearning",
      "https://www.instagram.com/chromaearlylearning"
    ],
    "description": "Premium childcare and early learning programs for infants through after school across Metro Atlanta with research-based curriculum and GA Pre-K.",
    "areaServed": {
      "@type": "City",
      "name": "Atlanta"
    }
  }
  </script>
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-brand-cream text-brand-ink overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>
