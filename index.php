<?php
/**
 * The main template file
 *
 * @package WP_Tailwind_Starter
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-b from-blue-50/70 to-slate-50 py-16 sm:py-24 border-b border-slate-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 mb-4">
            🚀 High-Performance WordPress Theme
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight max-w-3xl mx-auto leading-tight">
            Desarrollo Web Moderno con <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Tailwind CSS &amp; Vite</span>
        </h1>
        <p class="mt-4 text-base sm:text-lg text-slate-600 max-w-2xl mx-auto">
            Starter theme ultraligero y optimizado para 100/100 en Core Web Vitals. Código limpio, sin librerías pesadas y listo para producción.
        </p>
    </div>
</section>

<!-- Blog Cards Grid -->
<section id="blog" class="py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col group'); ?>>
                        
                        <!-- Thumbnail -->
                        <div class="aspect-video w-full bg-slate-100 overflow-hidden relative">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300']); ?>
                            <?php else : ?>
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-blue-50 text-slate-400">
                                    <svg class="w-12 h-12 stroke-current" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-slate-700 text-xs font-semibold px-2.5 py-1 rounded-md shadow-xs">
                                <?php 
                                $cats = get_the_category();
                                echo !empty($cats) ? esc_html($cats[0]->name) : 'General';
                                ?>
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="text-xs text-slate-500 mb-2 flex items-center gap-2">
                                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                    <span>•</span>
                                    <span><?php echo esc_html(get_the_author()); ?></span>
                                </div>
                                <h2 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2 mb-2">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <p class="text-sm text-slate-600 line-clamp-3 leading-relaxed">
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                            </div>

                            <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between">
                                <a href="<?php the_permalink(); ?>" class="text-sm font-semibold text-blue-600 hover:text-blue-700 inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                                    <?php esc_html_e('Leer artículo', 'wp-tailwind-starter'); ?> &rarr;
                                </a>
                            </div>
                        </div>

                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?php
                the_posts_pagination([
                    'prev_text' => '&larr; ' . __('Anterior', 'wp-tailwind-starter'),
                    'next_text' => __('Siguiente', 'wp-tailwind-starter') . ' &rarr;',
                    'class'     => 'flex items-center gap-2',
                ]);
                ?>
            </div>

        <?php else : ?>
            <div class="text-center py-16 bg-white rounded-2xl border border-slate-200 p-8 max-w-lg mx-auto">
                <h3 class="text-lg font-semibold text-slate-900"><?php esc_html_e('Aún no hay publicaciones', 'wp-tailwind-starter'); ?></h3>
                <p class="text-sm text-slate-500 mt-2"><?php esc_html_e('Comienza a redactar tu primer post desde el panel de WordPress.', 'wp-tailwind-starter'); ?></p>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php
get_footer();
