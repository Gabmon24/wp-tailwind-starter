<?php
/**
 * Single post template
 *
 * @package WP_Tailwind_Starter
 */

get_header();
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Post Header -->
            <header class="mb-8 text-center sm:text-left">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 text-xs font-medium text-slate-500 mb-3">
                    <span class="bg-blue-100 text-blue-800 px-2.5 py-0.5 rounded-full font-semibold">
                        <?php 
                        $cats = get_the_category();
                        echo !empty($cats) ? esc_html($cats[0]->name) : 'General';
                        ?>
                    </span>
                    <span>•</span>
                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                    <span>•</span>
                    <span>Por <?php echo esc_html(get_the_author()); ?></span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    <?php the_title(); ?>
                </h1>
            </header>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="aspect-video w-full rounded-2xl overflow-hidden mb-10 shadow-md">
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                </div>
            <?php endif; ?>

            <!-- Post Content -->
            <div class="prose prose-slate prose-lg max-w-none prose-headings:font-bold prose-headings:tracking-tight prose-a:text-blue-600 prose-img:rounded-xl">
                <?php the_content(); ?>
            </div>

            <!-- Tags -->
            <?php if (has_tag()) : ?>
                <div class="mt-8 pt-6 border-t border-slate-200 flex flex-wrap gap-2 items-center">
                    <span class="text-xs font-semibold text-slate-500 uppercase mr-2"><?php esc_html_e('Etiquetas:', 'wp-tailwind-starter'); ?></span>
                    <?php
                    $tags = get_the_tags();
                    foreach ($tags as $tag) {
                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 px-2.5 py-1 rounded-md transition-colors">#' . esc_html($tag->name) . '</a>';
                    }
                    ?>
                </div>
            <?php endif; ?>

            <!-- Author Box -->
            <div class="mt-10 p-6 bg-slate-100/80 rounded-2xl border border-slate-200/80 flex flex-col sm:flex-row items-center sm:items-start gap-4">
                <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-300 flex-shrink-0">
                    <?php echo get_avatar(get_the_author_meta('ID'), 64, '', '', ['class' => 'w-full h-full object-cover']); ?>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900"><?php echo esc_html(get_the_author()); ?></h3>
                    <p class="text-xs text-slate-500 mt-1">Autor &amp; Desarrollador</p>
                    <p class="text-sm text-slate-600 mt-2">
                        <?php echo esc_html(get_the_author_meta('description') ?: 'Creador de contenido y apasionado del desarrollo web moderno con WordPress y tecnologías frontend.'); ?>
                    </p>
                </div>
            </div>

            <!-- Comments -->
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
