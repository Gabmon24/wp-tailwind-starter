<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen selection:bg-blue-600 selection:text-white'); ?>>
<?php wp_body_open(); ?>

<!-- Reading Progress Bar (Active on single posts) -->
<div id="wpts-progress" class="fixed top-0 left-0 h-1 bg-blue-600 z-50 w-0 transition-all duration-150"></div>

<!-- Header -->
<header id="wpts-header" class="sticky top-0 z-40 w-full bg-white/80 backdrop-blur-md border-b border-slate-200/80 transition-shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">
            
            <!-- Site Brand / Logo -->
            <div class="flex items-center gap-3">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 text-xl font-bold tracking-tight text-slate-900 hover:text-blue-600 transition-colors">
                        <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-600 text-white font-extrabold text-lg shadow-sm">
                            <?php echo esc_html(substr(get_bloginfo('name'), 0, 1)); ?>
                        </span>
                        <span><?php bloginfo('name'); ?></span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600" aria-label="<?php esc_attr_e('Menú Principal', 'wp-tailwind-starter'); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-6',
                        'fallback_cb'    => false,
                        'depth'          => 2,
                    ]);
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '" class="hover:text-blue-600 transition-colors">Inicio</a>';
                    echo '<a href="' . esc_url(home_url('/#blog')) . '" class="hover:text-blue-600 transition-colors">Blog</a>';
                    echo '<a href="' . esc_url(home_url('/#contacto')) . '" class="hover:text-blue-600 transition-colors">Contacto</a>';
                }
                ?>
                <a href="#contacto" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm transition-transform active:scale-95">
                    <?php esc_html_e('Contactar', 'wp-tailwind-starter'); ?>
                </a>
            </nav>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden items-center">
                <button id="wpts-menu-toggle" type="button" class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="<?php esc_attr_e('Abrir menú de navegación', 'wp-tailwind-starter'); ?>" aria-expanded="false">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="wpts-burger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path id="wpts-close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="wpts-mobile-menu" class="hidden md:hidden border-b border-slate-200 bg-white px-4 pt-2 pb-6 space-y-3">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col space-y-3 text-base font-medium text-slate-700',
                'fallback_cb'    => false,
            ]);
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '" class="block py-2 text-slate-700 hover:text-blue-600">Inicio</a>';
            echo '<a href="' . esc_url(home_url('/#blog')) . '" class="block py-2 text-slate-700 hover:text-blue-600">Blog</a>';
            echo '<a href="' . esc_url(home_url('/#contacto')) . '" class="block py-2 text-slate-700 hover:text-blue-600">Contacto</a>';
        }
        ?>
        <a href="#contacto" class="block w-full text-center px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm">
            <?php esc_html_e('Contactar Asesor', 'wp-tailwind-starter'); ?>
        </a>
    </div>
</header>
<main class="flex-grow">
