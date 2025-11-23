<?php
/**
 * Single Location template.
 *
 * @package chroma
 */

do_action('chroma_before_location');
get_header();

$address   = chroma_field('address', get_the_ID(), []);
$phone     = chroma_field('contact_phone', get_the_ID(), get_option('admin_phone')); // phpcs:ignore WordPress.Security.EscapeOutput
$status    = chroma_field('enrollment_status', get_the_ID(), 'Now Enrolling');
$hero_img  = chroma_field('location_hero', get_the_ID());
$programs  = chroma_field('programs_offered', get_the_ID(), []);
$schools   = chroma_field('schools_served', get_the_ID(), []);
$cta_tour  = chroma_field('location_tour_url', get_the_ID(), home_url('/contact/'));
$cta_call  = $phone ? 'tel:' . preg_replace('/[^0-9+]/', '', $phone) : home_url('/contact/');

if (!$address || !is_array($address)) {
    $address = [
        'street' => '123 Prism Lane',
        'city'   => 'Sample City',
        'state'  => 'GA',
        'zip'    => '30000',
    ];
}
?>

<main class="bg-brand-cream text-brand-navy">
    <article id="post-<?php the_ID(); ?>" <?php post_class('location-single'); ?>>
        <section class="pt-24 pb-16 px-4 lg:px-8 max-w-6xl mx-auto grid lg:grid-cols-2 gap-10 items-center">
            <div class="space-y-5">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-chroma-blue">Chroma Campus</p>
                <h1 class="font-serif text-4xl sm:text-5xl font-bold leading-tight"><?php the_title(); ?></h1>
                <p class="text-slate-700 text-lg">Serving families in <?php echo esc_html($address['city'] . ', ' . $address['state']); ?> with warm educators, secure classrooms, and the Prismpath™ learning experience.</p>
                <div class="inline-flex items-center gap-3 bg-white border border-slate-200 px-4 py-2 rounded-full text-sm shadow-soft">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span class="font-semibold"><?php echo esc_html($status); ?></span>
                </div>
                <div class="flex flex-wrap gap-3 pt-2">
                    <a class="bg-chroma-red text-white px-6 py-3 rounded-full text-sm font-semibold shadow-soft" href="<?php echo esc_url($cta_tour); ?>" data-event="chroma_cta_click">Book a Tour</a>
                    <a class="border border-slate-300 bg-white text-brand-navy px-6 py-3 rounded-full text-sm font-semibold hover:border-brand-navy" href="<?php echo esc_url($cta_call); ?>" data-event="chroma_cta_click">Call the Director</a>
                </div>
                <div class="text-sm text-slate-600">
                    <p><?php echo esc_html($address['street']); ?></p>
                    <p><?php echo esc_html($address['city'] . ', ' . $address['state'] . ' ' . $address['zip']); ?></p>
                    <?php if ($phone) : ?>
                        <p><?php echo esc_html($phone); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bg-white rounded-[2.5rem] shadow-soft border border-slate-100 overflow-hidden h-full min-h-[320px]">
                <?php if ($hero_img && is_array($hero_img)) : ?>
                    <img class="w-full h-full object-cover" src="<?php echo esc_url($hero_img['url']); ?>" alt="<?php echo esc_attr($hero_img['alt'] ?: get_the_title()); ?>">
                <?php else : ?>
                    <div class="w-full h-full bg-gradient-to-br from-chroma-blue-light via-white to-chroma-green-light flex items-center justify-center text-slate-500">Campus photo coming soon</div>
                <?php endif; ?>
            </div>
        </section>

        <section class="bg-white border-y border-slate-100 py-14 px-4 lg:px-8">
            <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-10">
                <div class="space-y-4">
                    <h2 class="font-serif text-3xl font-bold">About this campus</h2>
                    <div class="prose prose-slate max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="bg-brand-cream rounded-[2rem] p-6 border border-slate-200 space-y-4">
                    <h3 class="font-serif text-2xl font-bold">Programs offered</h3>
                    <?php if ($programs) : ?>
                        <ul class="space-y-3 text-slate-700">
                            <?php foreach ((array) $programs as $program) : ?>
                                <li class="flex items-center justify-between gap-3 bg-white px-4 py-3 rounded-xl border border-slate-200">
                                    <span class="font-semibold"><?php echo esc_html(get_the_title($program)); ?></span>
                                    <a class="text-chroma-blue text-sm font-semibold" href="<?php echo esc_url(get_permalink($program)); ?>" data-event="chroma_cta_click">Learn more →</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-sm text-slate-600">Infant, Toddler, Preschool, GA Pre-K, and After School programs available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="py-14 px-4 lg:px-8 bg-gradient-to-br from-chroma-blue-light via-white to-chroma-yellow-light">
            <div class="max-w-6xl mx-auto grid lg:grid-cols-[1.1fr,1fr] gap-10 items-start">
                <div class="space-y-4">
                    <h2 class="font-serif text-3xl font-bold">Schools we serve</h2>
                    <p class="text-slate-700">Transportation and after-school care for nearby elementary schools.</p>
                    <?php if ($schools) : ?>
                        <ul class="grid sm:grid-cols-2 gap-3 text-sm text-slate-700">
                            <?php foreach ((array) $schools as $school) :
                                $name = is_array($school) ? ($school['name'] ?? '') : $school;
                                if (!$name) {
                                    continue;
                                }
                                ?>
                                <li class="bg-white border border-slate-200 rounded-xl px-4 py-3 shadow-sm"><?php echo esc_html($name); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-sm text-slate-600">School pickup list coming soon. Ask your Director for current routes.</p>
                    <?php endif; ?>
                </div>
                <div class="bg-white rounded-[2rem] shadow-soft border border-slate-100 p-6 space-y-3">
                    <h3 class="font-semibold text-lg">Visit this campus</h3>
                    <p class="text-sm text-slate-700">Schedule a private tour to explore classrooms, meet teachers, and review enrollment details.</p>
                    <div class="flex flex-wrap gap-3">
                        <a class="bg-brand-navy text-white px-5 py-3 rounded-full text-sm font-semibold shadow-soft" href="<?php echo esc_url($cta_tour); ?>" data-event="chroma_cta_click">Book a Tour</a>
                        <a class="border border-slate-300 bg-white text-brand-navy px-5 py-3 rounded-full text-sm font-semibold" href="<?php echo esc_url($cta_call); ?>" data-event="chroma_cta_click">Call the Director</a>
                    </div>
                </div>
            </div>
        </section>
    </article>
</main>

<?php
get_footer();
do_action('chroma_after_location');
