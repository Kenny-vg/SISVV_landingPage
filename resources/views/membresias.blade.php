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
            <div class="membresias-table-wrap">
                <table class="membresias-table">
                    <thead>
                        <tr>
                            <th>Membresía</th>
                            <th>Área</th>
                            <th>Monto mensual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memberships as $membership)
                        <tr class="@if($membership->is_featured) featured @endif">
                            <td data-label="Membresía" class="membresias-table-name">
                                {{ $membership->name }}
                                @if($membership->is_featured)
                                <span class="membresias-table-badge">Recomendado</span>
                                @endif
                            </td>
                            <td data-label="Área">
                                {{ $membership->area ?: '—' }}
                            </td>
                            <td data-label="Monto mensual" class="membresias-table-price">
                                @if($membership->show_price && $membership->price)
                                    {{ $membership->price }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @php
                $beneficiosUnicos = collect();
                foreach ($memberships as $membership) {
                    $beneficiosUnicos = $beneficiosUnicos->merge($membership->benefits->pluck('benefit'));
                }
                $beneficiosUnicos = $beneficiosUnicos->unique()->values();
            @endphp

            @if($beneficiosUnicos->isNotEmpty())
            <div class="membresias-benefits-shared">
                <h3>Incluye acceso a:</h3>
                <ul>
                    @foreach($beneficiosUnicos as $beneficio)
                    <li>{{ $beneficio }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
