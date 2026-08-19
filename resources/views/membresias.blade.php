@extends('layouts.public')

@section('title', 'Membresías — Vista Verde Country Club')
@section('meta_description', 'Conoce los planes de membresía del Club Vista Verde y elige el que mejor se adapte a ti.')

@section('content')
<div class="membresias-page" style="padding-top: 120px; min-height: 100vh; background-color: var(--color-bg);">

    <!-- Hero -->
    <div class="membresias-hero" style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="membresias-hero-overlay"></div>
        <div class="membresias-hero-content">
            <span class="membresias-hero-tag">Vista Verde Club</span>
            <h1>Nuestras<br><span>Membresías.</span></h1>
            <p>Elige el plan que mejor se adapte a tu estilo de vida y disfruta de todos los beneficios que Vista Verde tiene para ti y tu familia.</p>
        </div>
    </div>

    <!-- Cards -->
    <section class="membresias-section">

        @if($memberships->isEmpty())
            <div class="membresias-empty">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 64px; height: 64px; margin: 0 auto 1.5rem; opacity: 0.3; display: block;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p style="font-size: 1.1rem;">No hay membresías disponibles actualmente.</p>
                <p style="font-size: 0.9rem; margin-top: 0.5rem; opacity: 0.7;">Pronto publicaremos nuestros planes.</p>
            </div>
        @else
            <div class="comparison-table-wrap">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th class="feature-col-header">Característica</th>
                            @foreach($memberships as $membership)
                            <th class="membership-col-header @if($membership->is_featured) featured @endif">
                                @if($membership->is_featured)
                                <span class="comparison-badge">Recomendado</span>
                                @endif
                                <span class="membership-name">{{ $membership->name }}</span>
                                <span class="membership-area">{{ $membership->area ?: '—' }}</span>
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row: Tipo / Integrantes -->
                        <tr>
                            <td class="feature-label">Número de Integrantes</td>
                            @foreach($memberships as $membership)
                            <td>
                                {{ $membership->members_text ?: '—' }}
                            </td>
                            @endforeach
                        </tr>

                        <!-- Row: Área de Acceso -->
                        <tr>
                            <td class="feature-label">Área Principal</td>
                            @foreach($memberships as $membership)
                            <td>{{ $membership->area ?: '—' }}</td>
                            @endforeach
                        </tr>

                        <!-- Row: Acceso a Campo de Golf -->
                        <tr>
                            <td class="feature-label">Acceso a Campo de Golf</td>
                            @foreach($memberships as $membership)
                            <td class="feature-check-cell">
                                @if($membership->has_golf_access)
                                    <span class="check-icon-wrap" title="Incluido">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                @else
                                    <span class="dash-symbol">—</span>
                                @endif
                            </td>
                            @endforeach
                        </tr>

                        <!-- Rows for all unique benefits -->
                        @php
                            $allBenefits = collect();
                            foreach ($memberships as $membership) {
                                $allBenefits = $allBenefits->merge($membership->benefits->pluck('benefit'));
                            }
                            $allBenefits = $allBenefits->unique()->values();
                        @endphp

                        @foreach($allBenefits as $benefit)
                        <tr>
                            <td class="feature-label">{{ $benefit }}</td>
                            @foreach($memberships as $membership)
                            <td class="feature-check-cell">
                                @if($membership->benefits->contains('benefit', $benefit))
                                    <span class="check-icon-wrap" title="Incluido">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                @else
                                    <span class="dash-symbol">—</span>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach

                        <!-- Row: Inversión Mensual (At the bottom) -->
                        <tr class="price-footer-row">
                            <td class="feature-label">Inversión Mensual</td>
                            @foreach($memberships as $membership)
                            <td class="price-footer-cell">
                                @if(setting('show_membership_prices', true) && $membership->show_price && $membership->price)
                                    <span class="membership-price-footer">{{ $membership->price }}</span> <small>/ mes</small>
                                @else
                                    <span class="dash-symbol">Consultar</span>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        @php
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
        @endphp

        @if(count($reglamentoItems))
        <section class="reglamento-section">
            <h2 class="reglamento-heading">{{ setting('membresias_reglamento_heading', 'Reglamento del socio') }}</h2>
            <div class="reglamento-grid">
                @foreach($reglamentoItems as [$reglamentoTitle, $reglamentoBody])
                <div class="reglamento-item">
                    <h3 class="reglamento-item-title">{{ $reglamentoTitle }}</h3>
                    <div class="reglamento-item-body">{!! $reglamentoBody !!}</div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

    </section>

</div>
@endSection
