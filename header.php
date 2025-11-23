<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="description" content="Chroma Early Learning Academy offers premium childcare and early education for infants through school-age in Metro Atlanta. 19+ locations, GA Pre-K, research-based Chroma Spectrum™ curriculum, and exceptional parent communication." />
  <meta name="robots" content="index,follow" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Chroma Early Learning Academy | Metro Atlanta Childcare &amp; GA Pre-K" />
  <meta property="og:description" content="Modern, research-based childcare for ages 6 weeks–12 years across Metro Atlanta. 19+ neighborhood campuses, GA Pre-K, warm teachers, and beautiful classrooms." />
  <meta property="og:url" content="https://chromaela.com/" />
  <meta property="og:site_name" content="Chroma Early Learning Academy" />
  <meta property="og:image" content="https://chromaela.com/og-image.jpg" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Chroma Early Learning Academy | Metro Atlanta Childcare &amp; GA Pre-K" />
  <meta name="twitter:description" content="Modern early learning experience for infants through after school in Metro Atlanta." />

  <link rel="canonical" href="https://chromaela.com/" />

  <!-- Favicon (replace href paths as needed) -->
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />

  <!-- Organization Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ChildCare",
    "name": "Chroma Early Learning Academy",
    "url": "https://chromaela.com/",
    "logo": "https://chromaela.com/logo.png",
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
<body <?php body_class( 'bg-brand-cream text-brand-navy overflow-x-hidden' ); ?>>
