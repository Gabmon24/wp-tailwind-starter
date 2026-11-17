</main><!-- /main -->

<footer class="bg-slate-900 text-slate-400 mt-20 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            
            <!-- Col 1: Brand -->
            <div class="md:col-span-2 space-y-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 text-xl font-bold tracking-tight text-white">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-600 text-white font-extrabold text-base">
                        <?php echo esc_html(substr(get_bloginfo('name'), 0, 1)); ?>
                    </span>
                    <span><?php bloginfo('name'); ?></span>
                </a>
                <p class="text-sm text-slate-400 max-w-sm leading-relaxed">
                    <?php bloginfo('description'); ?>
                </p>
                <div class="text-xs text-slate-500 font-mono">
                    Construido con WP Tailwind Starter · 100% Core Web Vitals
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-200 mb-4"><?php esc_html_e('Navegación', 'wp-tailwind-starter'); ?></h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white transition-colors">Inicio</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#blog')); ?>" class="hover:text-white transition-colors">Artículos</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#contacto')); ?>" class="hover:text-white transition-colors">Contacto</a></li>
                </ul>
            </div>

            <!-- Col 3: Legal & Author -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-200 mb-4"><?php esc_html_e('Desarrollado Por', 'wp-tailwind-starter'); ?></h4>
                <p class="text-sm text-slate-300 font-medium">Gabriel Montiel Chamorro</p>
                <p class="text-xs text-slate-500 mt-1">Full Stack & WordPress Engineering</p>
                <div class="mt-4 flex items-center gap-3">
                    <a href="https://github.com/Gabmon24" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white text-xs underline">
                        GitHub (@Gabmon24)
                    </a>
                    <span>•</span>
                    <a href="https://linkedin.com/in/gabriel-montielc" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white text-xs underline">
                        LinkedIn
                    </a>
                </div>
            </div>

        </div>

        <div class="pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Todos los derechos reservados.', 'wp-tailwind-starter'); ?></p>
            <p><?php esc_html_e('Tema de código abierto bajo licencia GPL-2.0+.', 'wp-tailwind-starter'); ?></p>
        </div>
    </div>
</footer>

<!-- Back to top button -->
<button id="wpts-back-to-top" class="fixed bottom-6 right-6 p-3 rounded-full bg-slate-900/80 text-white shadow-lg backdrop-blur-sm opacity-0 pointer-events-none transition-all hover:bg-blue-600 focus:outline-none" aria-label="<?php esc_attr_e('Volver arriba', 'wp-tailwind-starter'); ?>">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
