<?php
    if (!isset($hero)) {
        $hero = \App\Models\Hero::where('is_active', true)->orderBy('sort_order')->first();
    }
    if (!isset($pageSections)) {
        $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    }
    if (!isset($disciplines)) {
        $disciplines = \App\Models\Discipline::where('is_published', true)->orderBy('sort_order')->get();
    }
    if (!isset($facilities)) {
        $facilities = \App\Models\Facility::where('is_published', true)->orderBy('sort_order')->get();
    }
?>


<?php $__env->startSection('title', 'VistaVerde | Golf & Country Club — Campo de golf, canchas y membresías'); ?>
<?php $__env->startSection('meta_description', 'Vista Verde Country Club: campo de golf, canchas deportivas, clases, eventos y membresías en un entorno único. Descubre el club.'); ?>

<?php $__env->startSection('content'); ?>

    <section class="hero-asymmetric" style="background-image: url('<?php echo e($hero && $hero->background_image ? (str_starts_with($hero->background_image, 'images/') ? asset($hero->background_image) : asset('storage/' . $hero->background_image)) : asset('images/hero.jpg')); ?>');">
        <style>
            .hero-content h1 p,
            .hero-content p p {
                display: inline;
                font-size: inherit;
                font-weight: inherit;
                line-height: inherit;
                color: inherit;
                margin: 0;
                padding: 0;
            }
            .hero-content em,
            .hero-content i {
                color: var(--color-accent-gold);
                font-style: italic;
            }
        </style>
        <div class="hero-overlay"></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(setting('hero_show_golfista', true)): ?>
        <img src="<?php echo e(asset('images/golfista.webp')); ?>" alt="" class="hero-golfista">
        <img src="<?php echo e(asset('images/pelota-golf.png')); ?>" alt="" class="hero-golf-ball">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div class="hero-content">
            <h1><?php echo $hero?->title ?? setting('hero_title'); ?></h1>
            <p>
                <?php echo $hero?->subtitle ?? setting('hero_subtitle'); ?>

            </p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hero?->button_text): ?>
                <a href="<?php echo e($hero->button_link ? url($hero->button_link) : '#instalaciones'); ?>" class="btn-gold" style="text-decoration: none; display: inline-block;">
                    <?php echo e($hero->button_text); ?>

                </a>
            <?php else: ?>
                <button class="btn-gold" data-scroll-to="instalaciones">
                    <?php echo e(setting('hero_default_button', 'Explorar el Club')); ?>

                </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <?php if (isset($component)) { $__componentOriginal2f906c7b72b7f488716a138bd805a1ae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f906c7b72b7f488716a138bd805a1ae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.about-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('about-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f906c7b72b7f488716a138bd805a1ae)): ?>
<?php $attributes = $__attributesOriginal2f906c7b72b7f488716a138bd805a1ae; ?>
<?php unset($__attributesOriginal2f906c7b72b7f488716a138bd805a1ae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f906c7b72b7f488716a138bd805a1ae)): ?>
<?php $component = $__componentOriginal2f906c7b72b7f488716a138bd805a1ae; ?>
<?php unset($__componentOriginal2f906c7b72b7f488716a138bd805a1ae); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal81c72807132ffb34a5ed67ad325fbcfc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81c72807132ffb34a5ed67ad325fbcfc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mapa-interactivo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mapa-interactivo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81c72807132ffb34a5ed67ad325fbcfc)): ?>
<?php $attributes = $__attributesOriginal81c72807132ffb34a5ed67ad325fbcfc; ?>
<?php unset($__attributesOriginal81c72807132ffb34a5ed67ad325fbcfc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81c72807132ffb34a5ed67ad325fbcfc)): ?>
<?php $component = $__componentOriginal81c72807132ffb34a5ed67ad325fbcfc; ?>
<?php unset($__componentOriginal81c72807132ffb34a5ed67ad325fbcfc); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal4f3d6e1043d3ec116085d9414d141e75 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f3d6e1043d3ec116085d9414d141e75 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.instalaciones-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('instalaciones-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f3d6e1043d3ec116085d9414d141e75)): ?>
<?php $attributes = $__attributesOriginal4f3d6e1043d3ec116085d9414d141e75; ?>
<?php unset($__attributesOriginal4f3d6e1043d3ec116085d9414d141e75); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f3d6e1043d3ec116085d9414d141e75)): ?>
<?php $component = $__componentOriginal4f3d6e1043d3ec116085d9414d141e75; ?>
<?php unset($__componentOriginal4f3d6e1043d3ec116085d9414d141e75); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginala210a9b1441a95d9477bdd0d828c2892 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala210a9b1441a95d9477bdd0d828c2892 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.facilities-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('facilities-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala210a9b1441a95d9477bdd0d828c2892)): ?>
<?php $attributes = $__attributesOriginala210a9b1441a95d9477bdd0d828c2892; ?>
<?php unset($__attributesOriginala210a9b1441a95d9477bdd0d828c2892); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala210a9b1441a95d9477bdd0d828c2892)): ?>
<?php $component = $__componentOriginala210a9b1441a95d9477bdd0d828c2892; ?>
<?php unset($__componentOriginala210a9b1441a95d9477bdd0d828c2892); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginaled713a73978251c5279e2170f529bc48 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled713a73978251c5279e2170f529bc48 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.menu-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('menu-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled713a73978251c5279e2170f529bc48)): ?>
<?php $attributes = $__attributesOriginaled713a73978251c5279e2170f529bc48; ?>
<?php unset($__attributesOriginaled713a73978251c5279e2170f529bc48); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled713a73978251c5279e2170f529bc48)): ?>
<?php $component = $__componentOriginaled713a73978251c5279e2170f529bc48; ?>
<?php unset($__componentOriginaled713a73978251c5279e2170f529bc48); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc3de55e6de46fe9c28c984cea52d5339 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc3de55e6de46fe9c28c984cea52d5339 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.events-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('events-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc3de55e6de46fe9c28c984cea52d5339)): ?>
<?php $attributes = $__attributesOriginalc3de55e6de46fe9c28c984cea52d5339; ?>
<?php unset($__attributesOriginalc3de55e6de46fe9c28c984cea52d5339); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3de55e6de46fe9c28c984cea52d5339)): ?>
<?php $component = $__componentOriginalc3de55e6de46fe9c28c984cea52d5339; ?>
<?php unset($__componentOriginalc3de55e6de46fe9c28c984cea52d5339); ?>
<?php endif; ?>


    <!-- ==========================================
       SECCIÓN DE CONTACTO & UBICACIÓN
       ========================================== -->
    <section class="premium-section bg-obsidian fade-in-section" style="background-color: var(--color-bg); padding: 5rem 8%;" id="contacto">
        <style>
            @media (max-width: 991px) {
                .contacto-grid-wrapper {
                    grid-template-columns: 1fr !important;
                    gap: 3.5rem !important;
                }
                .map-iframe-container {
                    height: 350px !important;
                }
            }
        </style>

        <div style="max-width: 1200px; margin: 0 auto;">
            <div class="contacto-grid-wrapper" style="display: grid; grid-template-columns: 1fr 1.1fr; gap: 3.5rem; align-items: center;">

                <!-- Columna Izquierda: Información de Ubicación -->
                <div>
                    <div class="section-header-editorial" style="margin-bottom: 3rem;">
                        <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 0.8rem;"><?php echo e(setting('contact_label', 'Visítenos')); ?></span>
                        <h2 style="color: var(--color-text-primary);"><?php echo setting('contact_heading', 'Ubicación<br><span>y acceso.</span>'); ?></h2>
                        <p style="margin-top: 1.5rem; line-height: 1.7; font-size: 0.95rem;">
                            <?php echo e(setting('contact_subtext', 'Vista Verde Country Club se encuentra ubicado en una zona privilegiada y de fácil acceso en Tehuacán, ofreciendo un entorno natural exclusivo de total privacidad para sus socios.')); ?>

                        </p>
                    </div>

                    <div style="margin-bottom: 2.5rem; border-left: 2px solid var(--color-accent-gold); padding-left: 1.5rem; display: flex; flex-direction: column; gap: 0.5rem;">
                        <span style="font-family: var(--font-alt); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--color-text-secondary); opacity: 0.7;"><?php echo e(setting('contact_address_label', 'Dirección Principal')); ?></span>
                        <p style="margin: 0; font-family: var(--font-base); font-size: 1.05rem; color: var(--color-text-primary); font-weight: 600;"><?php echo e(setting('contact_address_name', 'Casa Club Vista Verde')); ?></p>
                        <p style="margin: 0; color: var(--color-text-secondary); font-size: 0.95rem; line-height: 1.5;">
                            <?php echo e(setting('contact_address_line1', 'Carretera Federal México-Tehuacán Km. 252')); ?><br>
                            <?php echo e(setting('contact_address_line2', 'San Nicolás Tetitzintla, 75710 Tehuacán, Pue.')); ?>

                        </p>
                    </div>

                    <a href="<?php echo e(safe_url(setting('contact_maps_url', '#'))); ?>" target="_blank" rel="noopener" class="btn-link" style="text-decoration: none; color: var(--color-accent-gold); font-family: var(--font-alt); font-size: 0.8rem; letter-spacing: 1.5px; text-transform: uppercase; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                        <?php echo e(setting('contact_maps_btn_text', 'Cómo Llegar en Google Maps →')); ?>

                    </a>
                </div>

                <!-- Columna Derecha: Redes Sociales + Mapa -->
                <div>

                    <!-- Redes Sociales -->
                    <div style="margin-bottom: 2rem;">
                        <span style="font-family: var(--font-alt); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent-gold); display: block; margin-bottom: 1rem;">
                            <?php echo e(setting('contact_social_heading', 'Síguenos en redes')); ?>

                        </span>
                        <div style="display: flex; gap: 1.25rem;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(setting('social_facebook')): ?>
                            <a href="<?php echo e(safe_url(setting('social_facebook'))); ?>" target="_blank" rel="noopener" aria-label="Facebook" style="color: var(--color-text-secondary); transition: color 0.3s ease, transform 0.3s ease; display: inline-flex;" onmouseover="this.style.color='var(--color-accent-gold)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.color=''; this.style.transform=''">
                                <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                            </a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(setting('social_instagram')): ?>
                            <a href="<?php echo e(safe_url(setting('social_instagram'))); ?>" target="_blank" rel="noopener" aria-label="Instagram" style="color: var(--color-text-secondary); transition: color 0.3s ease, transform 0.3s ease; display: inline-flex;" onmouseover="this.style.color='var(--color-accent-gold)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.color=''; this.style.transform=''">
                                <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(setting('social_whatsapp')): ?>
                            <a href="<?php echo e(safe_url(setting('social_whatsapp'))); ?>" target="_blank" rel="noopener" aria-label="WhatsApp" style="color: var(--color-text-secondary); transition: color 0.3s ease, transform 0.3s ease; display: inline-flex;" onmouseover="this.style.color='var(--color-accent-gold)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.color=''; this.style.transform=''">
                                <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <?php
                        $defaultMapEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.002589867335!2d-97.41330921649934!3d18.483541887826103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5a2cf77bbf7f9%3A0x992163d342c0d985!2sCasa%20Club%20Vista%20Verde%20Country%20Club!5e0!3m2!1ses-419!2smx!4v1783023157035!5m2!1ses-419!2smx';
                        $mapsEmbed = safe_iframe_src(setting('contact_maps_embed', $defaultMapEmbed));
                    ?>
                    <div class="map-iframe-container" style="width: 100%; height: 450px; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.05);">
                        <iframe src="<?php echo e($mapsEmbed ?: $defaultMapEmbed); ?>" width="100%" height="100%" style="border:0; display: block;" allowfullscreen="" loading="lazy" title="Mapa de ubicación de Vista Verde Country Club" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->startPush('scripts'); ?>
<script>
    document.querySelector('[data-scroll-to]')?.addEventListener('click', function () {
        document.getElementById(this.dataset.scrollTo)?.scrollIntoView({ behavior: 'smooth' });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views\welcome.blade.php ENDPATH**/ ?>