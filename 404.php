<?php
/**
 * 404 Error Template
 *
 * @package WP_Tailwind_Starter
 */

get_header();
?>

<div class="max-w-2xl mx-auto px-4 py-24 text-center">
    <span class="text-6xl font-extrabold text-blue-600 block mb-2">404</span>
    <h1 class="text-3xl font-bold text-slate-900 tracking-tight mb-4">
        <?php esc_html_e('Página no encontrada', 'wp-tailwind-starter'); ?>
    </h1>
    <p class="text-slate-600 text-base mb-8 max-w-md mx-auto">
        <?php esc_html_e('Lo sentimos, la página que estás buscando no existe, ha sido movida o eliminada.', 'wp-tailwind-starter'); ?>
    </p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-all">
        &larr; <?php esc_html_e('Volver al Inicio', 'wp-tailwind-starter'); ?>
    </a>
</div>

<?php
get_footer();
