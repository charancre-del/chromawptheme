<?php
/**
 * Template for the Employers page with Prismpath-style hero and CTA rows.
 */

require_once get_template_directory() . '/inc/prismpath-helpers.php';

get_header();

$hero = chroma_build_hero_from_page('employers_hero');
$hero['eyebrow'] = $hero['eyebrow'] ?: __('For Employers', 'chroma');
$hero['title'] = $hero['title'] ?: __('Childcare benefits that attract and retain top talent', 'chroma');
$hero['lede'] = $hero['lede'] ?: __('Flexible partnerships, preferred enrollment, and concierge support built for working families.', 'chroma');
$hero['kicker'] = $hero['kicker'] ?: __('Atlanta campuses • GA Pre-K partner • Modern communications', 'chroma');

$cta = chroma_build_cta('#contact', __('Talk with Partnerships', 'chroma'));
$cta['title'] = $cta['title'] ?: __('Bring childcare support to your team', 'chroma');
$cta['subtitle'] = $cta['subtitle'] ?: __('Share your workforce goals and we will recommend the right partnership model.', 'chroma');
?>

<?php get_template_part('template-parts/prism-hero', null, ['hero' => $hero]); ?>

<section class="bg-white py-14 lg:py-16 border-t border-slate-100">
  <div class="max-w-6xl mx-auto px-4 lg:px-6">
    <div class="bg-white border border-slate-200 shadow-soft rounded-[1.75rem] p-6 md:p-10 space-y-6">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="prose max-w-none prose-slate prose-headings:font-serif prose-headings:text-brand-navy prose-a:text-chroma-teal">
          <?php the_content(); ?>
        </div>
      <?php endwhile; else : ?>
        <p class="text-slate-600 text-sm"><?php esc_html_e('Partnership details will be posted soon—contact us for immediate support.', 'chroma'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/prism-cta-row', null, ['cta' => $cta]); ?>

<?php get_footer(); ?>
