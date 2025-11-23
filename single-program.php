<?php
/**
 * Single Program template.
 *
 * @package chroma
 */

do_action('chroma_before_program');
get_header();

$age_range     = chroma_field('age_range', get_the_ID(), '6 weeks – 12 months');
$tagline       = chroma_field('program_tagline', get_the_ID(), 'Warm, research-based care for growing minds.');
$features      = chroma_field('key_features', get_the_ID(), []);
$schedule_pill = chroma_field('schedule_highlights', get_the_ID(), []);

if (!is_array($features) || empty($features)) {
    $features = [
        'Small class sizes with caring educators',
        'Research-based Prismpath™ learning experiences',
        'Daily parent updates with photos and notes',
        'Beautiful, secure classrooms designed for discovery',
    ];
}

if (!is_array($schedule_pill) || empty($schedule_pill)) {
    $schedule_pill = [
        ['label' => 'Morning', 'text' => 'Warm welcome, circle time, and hands-on centers'],
        ['label' => 'Midday', 'text' => 'Family-style meals, outdoor play, and rest'],
        ['label' => 'Afternoon', 'text' => 'Enrichment clubs, projects, and pick-up'],
    ];
}

$cta_enroll = chroma_field('program_cta_url', get_the_ID(), home_url('/contact/'));
$cta_tour   = chroma_field('program_tour_url', get_the_ID(), home_url('/locations/'));
?>

<main class="bg-brand-cream text-brand-navy">
    <article id="post-<?php the_ID(); ?>" <?php post_class('program-single'); ?>>
        <section class="pt-24 pb-16 px-4 lg:px-8 max-w-6xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-chroma-blue">Prismpath™ Program</p>
                <h1 class="font-serif text-4xl sm:text-5xl font-bold leading-tight">
                    <?php the_title(); ?>
                </h1>
                <p class="text-lg text-slate-700"><?php echo esc_html($tagline); ?></p>
                <div class="inline-flex items-center gap-3 bg-white border border-slate-200 px-4 py-2 rounded-full text-sm shadow-soft">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span class="font-semibold">Age range: <?php echo esc_html($age_range); ?></span>
                </div>
                <div class="flex flex-wrap gap-3 pt-2">
                    <a class="bg-chroma-red text-white px-6 py-3 rounded-full text-sm font-semibold shadow-soft" href="<?php echo esc_url($cta_tour); ?>" data-event="chroma_cta_click">
                        Book a Tour
                    </a>
                    <a class="border border-slate-300 bg-white text-brand-navy px-6 py-3 rounded-full text-sm font-semibold hover:border-brand-navy" href="<?php echo esc_url($cta_enroll); ?>" data-event="chroma_cta_click">
                        Speak to an Enrollment Specialist
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-[2.5rem] shadow-soft border border-slate-100 p-8 space-y-4">
                <h2 class="font-serif text-2xl font-bold">What families love</h2>
                <ul class="space-y-3 text-slate-700">
                    <?php foreach ($features as $feature) :
                        $text = is_array($feature) ? ($feature['text'] ?? $feature['feature'] ?? '') : $feature;
                        if (!$text) {
                            continue;
                        }
                        ?>
                        <li class="flex gap-3">
                            <span class="mt-1 text-chroma-teal">✓</span>
                            <span><?php echo esc_html($text); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section class="bg-white border-y border-slate-100 py-14 px-4 lg:px-8">
            <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-10">
                <div class="space-y-4">
                    <h2 class="font-serif text-3xl font-bold">Daily rhythm</h2>
                    <p class="text-slate-700">A calm, predictable flow that balances connection, learning, and play.</p>
                    <div class="space-y-3">
                        <?php foreach ($schedule_pill as $item) :
                            $label = is_array($item) ? ($item['label'] ?? '') : '';
                            $text  = is_array($item) ? ($item['text'] ?? '') : $item;
                            if (!$text) {
                                continue;
                            }
                            ?>
                            <div class="flex gap-3 items-start bg-brand-cream rounded-2xl p-4 border border-slate-200">
                                <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-sm font-bold text-chroma-blue shadow-sm">
                                    <?php echo esc_html($label ?: 'Flow'); ?>
                                </div>
                                <p class="text-slate-700 text-sm leading-relaxed"><?php echo esc_html($text); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="bg-brand-cream rounded-[2rem] p-6 border border-slate-200">
                    <h3 class="font-serif text-2xl font-bold mb-3">Inside the classroom</h3>
                    <div class="prose prose-slate max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 px-4 lg:px-8 bg-gradient-to-br from-chroma-blue-light via-white to-chroma-green-light">
            <div class="max-w-6xl mx-auto grid lg:grid-cols-[1.2fr,1fr] gap-10 items-center">
                <div class="space-y-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-chroma-blue">Next step</p>
                    <h2 class="font-serif text-3xl font-bold">Ready to see this program?</h2>
                    <p class="text-slate-700 max-w-2xl">Meet the Director, tour classrooms, and talk through schedules, tuition, and openings for your family.</p>
                    <div class="flex flex-wrap gap-3">
                        <a class="bg-brand-navy text-white px-6 py-3 rounded-full text-sm font-semibold shadow-soft" href="<?php echo esc_url($cta_tour); ?>" data-event="chroma_cta_click">Schedule a Tour</a>
                        <a class="border border-slate-300 bg-white text-brand-navy px-6 py-3 rounded-full text-sm font-semibold" href="<?php echo esc_url($cta_enroll); ?>" data-event="chroma_cta_click">Talk with Enrollment</a>
                    </div>
                </div>
                <div class="bg-white rounded-[2rem] shadow-soft border border-slate-100 p-6">
                    <h3 class="font-semibold text-lg mb-3">Program quick facts</h3>
                    <ul class="space-y-2 text-slate-700 text-sm">
                        <li>Age range: <?php echo esc_html($age_range); ?></li>
                        <li>Curriculum: Prismpath™ experiential learning</li>
                        <li>Meals: Included, allergy-friendly options</li>
                        <li>Communication: Daily updates with photos</li>
                        <li>Safety: Secured entries and age-appropriate protocols</li>
                    </ul>
                </div>
            </div>
        </section>
    </article>
</main>

<?php
get_footer();
do_action('chroma_after_program');
