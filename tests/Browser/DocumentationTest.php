<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class DocumentationTest extends DuskTestCase
{
    /**
     * @throws Throwable
     */
    public function testDocumentationLandingPageIsOk(): void
    {
        $this->browse(
            fn (Browser $browser) => $browser
                ->visitRoute('docs')
                ->assertSee('Filament Documentation')
        );
    }
}
