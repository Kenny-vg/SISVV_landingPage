<?php $__env->startSection('title', 'Membresías — Vista Verde Country Club'); ?>
<?php $__env->startSection('meta_description', 'Conoce los planes de membresía del Club Vista Verde y elige el que mejor se adapte a ti.'); ?>

<?php $__env->startSection('content'); ?>
<div class="membresias-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg);">

    <!-- Hero -->
    <div class="membresias-hero" style="background-image: url('<?php echo e(asset('images/hero.jpg')); ?>');">
        <div class="membresias-hero-overlay"></div>
        <div class="membresias-hero-content">
            <span class="membresias-hero-tag">Vista Verde Club</span>
            <h1>Nuestras<br><span>Membresías.</span></h1>
            <p>Elige el plan que mejor se adapte a tu estilo de vida y disfruta de todos los beneficios que Vista Verde tiene para ti y tu familia.</p>
        </div>
    </div>

    <!-- Cards -->
    <section class="membresias-section">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($memberships->isEmpty()): ?>
            <div class="membresias-empty">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 64px; height: 64px; margin: 0 auto 1.5rem; opacity: 0.3; display: block;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p style="font-size: 1.1rem;">No hay membresías disponibles actualmente.</p>
                <p style="font-size: 0.9rem; margin-top: 0.5rem; opacity: 0.7;">Pronto publicaremos nuestros planes.</p>
            </div>
        <?php else: ?>
            <div class="comparison-table-wrap">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th class="feature-col-header">Característica</th>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="membership-col-header <?php if($membership->is_featured): ?> featured <?php endif; ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($membership->is_featured): ?>
                                <span class="comparison-badge">Recomendado</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <span class="membership-name"><?php echo e($membership->name); ?></span>
                                <span class="membership-area"><?php echo e($membership->area ?: '—'); ?></span>
                            </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row: Tipo / Integrantes -->
                        <tr>
                            <td class="feature-label">Número de Integrantes</td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <?php echo e($membership->members_text ?: '—'); ?>

                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>

                        <!-- Row: Área de Acceso -->
                        <tr>
                            <td class="feature-label">Área Principal</td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($membership->area ?: '—'); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>

                        <!-- Row: Acceso a Campo de Golf -->
                        <tr>
                            <td class="feature-label">Acceso a Campo de Golf</td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="feature-check-cell">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($membership->has_golf_access): ?>
                                    <span class="check-icon-wrap" title="Incluido">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                <?php else: ?>
                                    <span class="dash-symbol">—</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>

                        <!-- Rows for all unique benefits -->
                        <?php
                            $allBenefits = collect();
                            foreach ($memberships as $membership) {
                                $allBenefits = $allBenefits->merge($membership->benefits->pluck('benefit'));
                            }
                            $allBenefits = $allBenefits->unique()->values();
                        ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $allBenefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="feature-label"><?php echo e($benefit); ?></td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="feature-check-cell">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($membership->benefits->contains('benefit', $benefit)): ?>
                                    <span class="check-icon-wrap" title="Incluido">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                <?php else: ?>
                                    <span class="dash-symbol">—</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <!-- Row: Inversión Mensual (At the bottom) -->
                        <tr class="price-footer-row">
                            <td class="feature-label">Inversión Mensual</td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="price-footer-cell">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(setting('show_membership_prices', true) && $membership->show_price && $membership->price): ?>
                                    <span class="membership-price-footer"><?php echo e($membership->price); ?></span> <small>/ mes</small>
                                <?php else: ?>
                                    <span class="dash-symbol">Consultar</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php
            $reglamentoItems = [
                'actualizacion' => ['Actualización del costo de la membresía', setting('membresias_actualizacion')],
                'consumos' => ['Consumos mínimos mensuales', setting('membresias_consumos')],
                'pagos' => ['Pagos mensuales y recargos', setting('membresias_pagos')],
                'cortesia' => ['Pases de cortesía', setting('membresias_cortesia')],
                'baja' => ['Solicitud de baja de membresía', setting('membresias_baja')],
                'visitas' => ['Registro de visitas', setting('membresias_visitas')],
                'fotografia' => ['Fotografía obligatoria', setting('membresias_fotografia')],
                'contacto' => ['Contacto', setting('membresias_contacto')],
            ];
            $reglamentoItems = array_filter($reglamentoItems, fn ($item) => !empty($item[1]));
        ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($reglamentoItems)): ?>
        <section class="reglamento-section">
            <h2 class="reglamento-heading"><?php echo e(setting('membresias_reglamento_heading', 'Reglamento del socio')); ?></h2>
            <div class="reglamento-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $reglamentoItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$reglamentoTitle, $reglamentoBody]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="reglamento-item">
                    <h3 class="reglamento-item-title"><?php echo e($reglamentoTitle); ?></h3>
                    <div class="reglamento-item-body"><?php echo $reglamentoBody; ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </section>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mezaX\OneDrive\Desktop\Landing page VV\resources\views/membresias.blade.php ENDPATH**/ ?>