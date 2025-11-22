<?php
/**
 * ACF field group registration for homepage flexible content.
 *
 * Editors can override hero copy, stats, FAQ content, and section headings while
 * the template keeps the provided static layout as defaults when fields are empty.
 */

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group([
        'key' => 'group_chroma_home',
        'title' => __('Homepage Flexible Content', 'chroma'),
        'fields' => [
            [
                'key' => 'field_chroma_home_flex',
                'label' => __('Home Flexible Content', 'chroma'),
                'name' => 'home_flexible_content',
                'type' => 'flexible_content',
                'button_label' => __('Add Section', 'chroma'),
                'layouts' => [
                    'layout_chroma_hero' => [
                        'key' => 'layout_chroma_hero',
                        'name' => 'hero',
                        'label' => __('Hero', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_hero_badge',
                                'label' => __('Badge', 'chroma'),
                                'name' => 'badge_text',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_hero_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'textarea',
                            ],
                            [
                                'key' => 'field_chroma_hero_highlight',
                                'label' => __('Highlight', 'chroma'),
                                'name' => 'highlight',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_hero_body',
                                'label' => __('Body', 'chroma'),
                                'name' => 'body',
                                'type' => 'textarea',
                            ],
                            [
                                'key' => 'field_chroma_hero_cta_primary',
                                'label' => __('Primary CTA', 'chroma'),
                                'name' => 'primary_cta',
                                'type' => 'link',
                                'return_format' => 'array',
                            ],
                            [
                                'key' => 'field_chroma_hero_cta_secondary',
                                'label' => __('Secondary CTA', 'chroma'),
                                'name' => 'secondary_cta',
                                'type' => 'link',
                                'return_format' => 'array',
                            ],
                        ],
                    ],
                    'layout_chroma_stats' => [
                        'key' => 'layout_chroma_stats',
                        'name' => 'stats_strip',
                        'label' => __('Stats Strip', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_stats_items',
                                'label' => __('Stats Items', 'chroma'),
                                'name' => 'items',
                                'type' => 'repeater',
                                'button_label' => __('Add Stat', 'chroma'),
                                'sub_fields' => [
                                    [
                                        'key' => 'field_chroma_stats_value',
                                        'label' => __('Value', 'chroma'),
                                        'name' => 'value',
                                        'type' => 'text',
                                    ],
                                    [
                                        'key' => 'field_chroma_stats_label',
                                        'label' => __('Label', 'chroma'),
                                        'name' => 'label',
                                        'type' => 'text',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'layout_chroma_programs' => [
                        'key' => 'layout_chroma_programs',
                        'name' => 'programs',
                        'label' => __('Programs Wizard', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_programs_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_programs_intro',
                                'label' => __('Intro', 'chroma'),
                                'name' => 'intro',
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                    'layout_chroma_curriculum' => [
                        'key' => 'layout_chroma_curriculum',
                        'name' => 'curriculum',
                        'label' => __('Curriculum', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_curriculum_kicker',
                                'label' => __('Kicker', 'chroma'),
                                'name' => 'kicker',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_curriculum_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_curriculum_body',
                                'label' => __('Body', 'chroma'),
                                'name' => 'body',
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                    'layout_chroma_schedule' => [
                        'key' => 'layout_chroma_schedule',
                        'name' => 'schedule',
                        'label' => __('Schedule', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_schedule_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_schedule_intro',
                                'label' => __('Intro', 'chroma'),
                                'name' => 'intro',
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                    'layout_chroma_reviews' => [
                        'key' => 'layout_chroma_reviews',
                        'name' => 'reviews',
                        'label' => __('Reviews', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_reviews_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_reviews_subheading',
                                'label' => __('Subheading', 'chroma'),
                                'name' => 'subheading',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    'layout_chroma_locations' => [
                        'key' => 'layout_chroma_locations',
                        'name' => 'locations',
                        'label' => __('Locations', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_locations_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_locations_intro',
                                'label' => __('Intro', 'chroma'),
                                'name' => 'intro',
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                    'layout_chroma_tour' => [
                        'key' => 'layout_chroma_tour',
                        'name' => 'tour',
                        'label' => __('Tour CTA', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_tour_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_tour_intro',
                                'label' => __('Intro', 'chroma'),
                                'name' => 'intro',
                                'type' => 'textarea',
                            ],
                        ],
                    ],
                    'layout_chroma_faq' => [
                        'key' => 'layout_chroma_faq',
                        'name' => 'faq',
                        'label' => __('FAQ', 'chroma'),
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_chroma_faq_heading',
                                'label' => __('Heading', 'chroma'),
                                'name' => 'heading',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_chroma_faq_intro',
                                'label' => __('Intro', 'chroma'),
                                'name' => 'intro',
                                'type' => 'textarea',
                            ],
                            [
                                'key' => 'field_chroma_faq_items',
                                'label' => __('FAQ Items', 'chroma'),
                                'name' => 'items',
                                'type' => 'repeater',
                                'button_label' => __('Add Question', 'chroma'),
                                'sub_fields' => [
                                    [
                                        'key' => 'field_chroma_faq_question',
                                        'label' => __('Question', 'chroma'),
                                        'name' => 'question',
                                        'type' => 'text',
                                    ],
                                    [
                                        'key' => 'field_chroma_faq_answer',
                                        'label' => __('Answer', 'chroma'),
                                        'name' => 'answer',
                                        'type' => 'textarea',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ],
            ],
        ],
    ]);
}
