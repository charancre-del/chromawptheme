# WordPress Theme Plan

## Deliverables Coverage (per user checklist)

### Theme root files
- `style.css` with theme header and enqueue registration.
- `functions.php` loading `inc/` modules and registering theme supports.
- Root templates: `index.php`, `front-page.php`, `header.php`, `footer.php`.
- Core WordPress setup: menu registration, sidebar/widget areas, image sizes, Tailwind/JS enqueues, and Tailwind build references.

### `/inc/` modules
- `setup.php`: theme supports, image sizes, and defaults.
- `enqueue.php`: Tailwind/PostCSS build enqueues, main JS, map scripts, and plugin stylesheet hooks.
- `nav-menus.php`: Primary/Utility menus, mobile menu walker, and accessibility attributes.
- `cpt-programs.php`: register Programs CPT, taxonomy support, hooks entry points.
- `cpt-locations.php`: register Locations CPT with geo fields and relationships; auto-include in home/location strips.
- `acf-options.php`: global options (brand contact, social, GA/GTM/Meta IDs, SEO defaults).
- `acf-homepage.php`: Flexible Content fields for hero, stats, programs, locations strip, testimonials, stories teaser, CTAs, and map layer toggles.
- `template-tags.php`: helpers for cards, CTAs, and SEO text patterns.
- `cleanup.php`: head cleanup, canonical safety, robots rules, emoji/asset tweaks.
- `seo-engine.php`: JSON-LD builders (Organization, LocalBusiness, Article, BreadcrumbList), canonical logic, internal link builder, and hreflang for Spanish variants.
- `city-slug-logic.php`: city/locale slug generation and per-location SEO title helpers.
- `spanish-variant-generator.php`: duplicate/translate templates for Spanish pages with hreflang.
- `monthly-seo-cron.php`: scheduled SEO refresh (sitemap, internal links, keyword blocks).

### `/template-parts/`
- Home sections (hero, stats, programs grid, auto locations strip, testimonials, stories teaser, CTAs, map layer block).
- Programs templates (archive cards, single details, hooks regions).
- Location templates (archive grid, single hero/SEO block, programs offered, schools served, map, CTA rows).
- Parent hooks (before/after content injection regions for online forms/buttons).
- About hooks (bios repeater layout and CTA insertions).
- Stories templates (archive index with categories/tags, single story with schema).
- Dynamic SEO blocks (local keyword blurbs, CTA text filters, breadcrumb output).
- Dual landing page templates (e.g., Spanish/English variants sharing components).
- Spanish page templates (localized layouts, hreflang integration).

### `/acf-json/`
- Field groups for Home Flexible Content, Programs, Locations, SEO automation (title/meta helpers), Parent page buttons, About bios, Stories SEO, County pages and map data, and county + city taxonomy fields (if used).

### Plugins
- **Chroma Tour Form Plugin**: shortcode/block for home/CTA use, spam protection, email routing, ACF value injection, and GoHighLevel/LeadConnector webhook.
- **Chroma Acquisitions Form Plugin**: shortcode/block for acquisitions page, spam protection, email routing, ACF integration, and GoHighLevel/LeadConnector webhook.

### SEO assets
- Dynamic `sitemap.xml` builder tied to CPTs/taxonomies.
- Canonical rules and robots controls (with sensible defaults and overrides).
- Hreflang rules for Spanish pages and dual landing variants.
- Internal link builder (leveraging Programs/Locations/Stories relationships).

### Tailwind + JS
- `tailwind.config.js` and `postcss.config.js` for builds (Purging, custom colors, typography plugins).
- `main.js` for global UI (menus, accordions, accessibility helpers).
- `map-layer.js` for map UI, markers, and filters.

### Map layer
- GeoJSON normalization utilities, neighborhood polygons, nearby schools dataset, and employer markers for location and home map sections.

## Theme Structure
- Classic theme scaffold with `style.css` header, `functions.php`, `header.php`, `footer.php`, `front-page.php`, and page-specific templates (Parents, About Us, Employers, Acquisitions, Contact) plus CPT archives/singles for Programs, Locations, and Stories.
- Primary and Utility navigation menus registered and rendered in header/mobile menus.
- ACF Flexible Content on the home page for hero, stats, programs grid, auto-queried locations strip, testimonials/quotes, stories teaser, and CTA blocks.
- Shared template parts for cards (programs, locations, stories) and CTA/button components to keep markup consistent.
- Enqueue compiled CSS/JS (Tailwind build) via `functions.php`; avoid CDN in templates. Widgetized footer areas for reusable contact/CTA blocks.

## Content Types
- **Programs (CPT):** age range, schedule, tuition/fees, key features, hooks entry points; relationship field to Locations (all locations offer the same programs per user response).
- **Locations (CPT):** featured photo, SEO blurb with localized keywords, programs offered (relationship to Programs), schools served (individual school names), address/phone/hours, geo/map, "Book a Tour" CTA.
- **Stories (CPT for blog):** acts as Stories blog; archive shows stories index, categories/tags enabled (no author bios/headshots needed).
- **Pages:** Parents (buttons to online forms + hooks), About Us (editable bios repeater), Employers (tax credits), Acquisitions (plugin form + hooks), Contact (form plugin).

## Forms & Plugins
- Home hero/CTA form delivered as a plugin shortcode/block; the existing static home form will be ported here.
- Parents page plugin renders configurable buttons/links to online forms.
- Acquisitions intake form provided via plugin shortcode; Contact page uses preferred form plugin styling via theme.
- CRM/automation: integrate submissions with GoHighLevel/LeadConnector (webhook/API) and wire GA4/GTM/Meta tracking events/thank-you goals.
- Event tracking: capture form submission success, hook-triggered injections (before/after sections), and clicks on primary/secondary action buttons.

## Hooks and Extensibility
- `do_action` hooks before/after key sections on Programs, Parents, and Acquisitions templates.
- Filters for CTA text/URLs on program/location/story cards and for the home Locations strip query args.

## SEO Foundations
- Integrate with SEO plugin (Yoast/Rank Math) and map ACF meta into SEO fields; enforce canonical tags and clean slugs.
- JSON-LD: Organization sitewide, LocalBusiness on Locations (with address/phone/hours/geo), BreadcrumbList on hierarchies, Article on Stories.
- Local SEO copy: require city-specific H1/H2 patterns and minimum word counts (e.g., 250–400 words) on location pages; CTAs should include city names (e.g., "Book a Tour in {City}").
- Slug patterns: location permalinks follow the service-area convention (e.g., `/service-areas-johns-creek-ga`) with city-state tokens derived from location data.
- Media: editors will upload brand-appropriate sizes manually; support responsive images/WebP via WordPress image sizes.
- Performance/accessibility: semantic headings, alt text, aria labels, lazy-loading images, optimized Tailwind build.

## Outstanding Items
- Confirm business name format per location (brand + city?) and full address/lat-long for LocalBusiness schema.
- Define GA4/GTM/Meta event names and confirmation URLs for tracking.
