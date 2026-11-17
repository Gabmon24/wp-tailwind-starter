<?php
/**
 * The template for displaying all single pages
 *
 * @package WP_Tailwind_Starter
 */

get_header();
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="mb-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    <?php the_title(); ?>
                </h1>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="aspect-video w-full rounded-2xl overflow-hidden mb-8 shadow-sm">
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                </div>
            <?php endif; ?>

            <div class="prose prose-slate prose-lg max-w-none prose-headings:font-bold prose-a:text-blue-600 prose-img:rounded-xl">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
