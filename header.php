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
  <title>Chroma Early Learning Academy | Premium Childcare in Metro Atlanta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Chroma Early Learning Academy offers premium childcare and early education for infants through school-age in Metro Atlanta. 19+ locations, GA Pre-K, research-based Chroma Spectrum™ curriculum, and exceptional parent communication." />
  <meta name="robots" content="index,follow" />
  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Chroma Early Learning Academy | Metro Atlanta Childcare &amp; GA Pre-K" />
  <meta property="og:description" content="Modern, research-based childcare for ages 6 weeks–12 years across Metro Atlanta. 19+ neighborhood campuses, GA Pre-K, warm teachers, and beautiful classrooms." />
  <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>" />
  <meta property="og:site_name" content="Chroma Early Learning Academy" />
  <meta property="og:image" content="<?php echo esc_url(home_url('/og-image.jpg')); ?>" />
  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Chroma Early Learning Academy | Metro Atlanta Childcare &amp; GA Pre-K" />
  <meta name="twitter:description" content="Modern early learning experience for infants through after school in Metro Atlanta." />
  <link rel="canonical" href="<?php echo esc_url(home_url('/')); ?>" />
  <!-- Favicon (replace href paths as needed) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(home_url('/favicon-32x32.png')); ?>" />
  <link rel="apple-touch-icon" href="<?php echo esc_url(home_url('/apple-touch-icon.png')); ?>" />
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet" />
  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'system-ui', 'sans-serif'],
            serif: ['Playfair Display', 'ui-serif', 'Georgia', 'serif'],
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
      font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
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
<body <?php body_class('bg-brand-cream text-brand-navy overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>
