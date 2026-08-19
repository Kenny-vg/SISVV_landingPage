<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Discipline;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Membership;
use App\Models\PageSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_returns_ok(): void
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_eventos_index_returns_ok(): void
    {
        $this->get('/eventos')->assertStatus(200);
    }

    public function test_published_event_is_visible(): void
    {
        Event::create([
            'title' => 'Torneo de Golf',
            'category' => 'Deportes',
            'is_published' => true,
        ]);

        $this->get('/eventos')->assertOk()->assertSee('Torneo de Golf');
        $this->get('/eventos/torneo-de-golf')->assertOk();
    }

    public function test_unpublished_event_is_not_visible(): void
    {
        $event = Event::create([
            'title' => 'Evento Secreto',
            'is_published' => false,
        ]);

        $this->get('/eventos')->assertOk()->assertDontSee('Evento Secreto');
        $this->get('/eventos/'.$event->slug)->assertNotFound();
    }

    public function test_instalaciones_index_returns_ok(): void
    {
        $this->get('/instalaciones')->assertOk();
    }

    public function test_published_facility_is_visible_and_unpublished_returns_404(): void
    {
        $published = Facility::create([
            'title' => 'Casa Club',
            'slug' => 'casa-club',
            'is_published' => true,
        ]);
        $unpublished = Facility::create([
            'title' => 'Obra en Construcción',
            'slug' => 'obra-en-construccion',
            'is_published' => false,
        ]);

        $this->get('/instalaciones')->assertOk()->assertSee('Casa Club')->assertDontSee('Obra en Construcción');
        $this->get('/instalaciones/'.$published->slug)->assertOk();
        $this->get('/instalaciones/'.$unpublished->slug)->assertNotFound();
    }

    public function test_clases_index_returns_ok(): void
    {
        $this->get('/clases')->assertOk();
    }

    public function test_published_discipline_is_visible_and_unpublished_returns_404(): void
    {
        $published = Discipline::create([
            'title' => 'Golf',
            'slug' => 'golf',
            'is_published' => true,
        ]);
        $unpublished = Discipline::create([
            'title' => 'Clase Privada',
            'slug' => 'clase-privada',
            'is_published' => false,
        ]);

        $this->get('/clases')->assertOk()->assertSee('Golf')->assertDontSee('Clase Privada');
        $this->get('/clases/'.$published->slug)->assertOk();
        $this->get('/clases/'.$unpublished->slug)->assertNotFound();
    }

    public function test_membresias_returns_ok(): void
    {
        Membership::create([
            'name' => 'Membresía Familiar',
            'price' => '$10,000',
            'is_published' => true,
        ]);

        $this->get('/membresias')->assertOk()->assertSee('Membresía Familiar');
    }

    public function test_nosotros_returns_ok(): void
    {
        PageSection::create([
            'key' => 'about_mission',
            'title' => 'Misión',
            'content' => 'Nuestra misión.',
            'is_active' => true,
        ]);

        $this->get('/nosotros')->assertOk()->assertSee('Nuestra misión.');
    }

    public function test_lector_only_shows_visible_categories(): void
    {
        $visible = Category::create([
            'name' => 'Platillos',
            'slug' => 'platillos',
            'is_visible' => true,
        ]);
        Category::create([
            'name' => 'Oculto',
            'slug' => 'oculto',
            'is_visible' => false,
        ]);

        $this->get('/lector')->assertOk()->assertSee('Platillos')->assertDontSee('Oculto');
        $this->get('/lector-pdf?category='.$visible->slug)->assertOk();
        $this->get('/lector-pdf?category=oculto')->assertNotFound();
        $this->get('/lector-pdf?category=no-existe')->assertNotFound();
    }

    public function test_legal_pages_return_ok(): void
    {
        $this->get('/aviso-de-privacidad')->assertOk();
        $this->get('/terminos-y-condiciones')->assertOk();
    }

    public function test_security_headers_are_present(): void
    {
        $response = $this->get('/');

        $response->assertHeader('Content-Security-Policy');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'DENY');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }
}
