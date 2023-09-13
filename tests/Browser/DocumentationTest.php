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

    /**
     * @throws Throwable
     */
    public function testDocumentationCanSwitchToDifferentVersions(): void
    {
        $this->browse(
            fn (Browser $browser) => $browser
                ->visitRoute('docs')

                // has and can open click on the version selector
                ->waitFor("[aria-label='Open version options']")
                ->click("[aria-label='Open version options']")

                // version 2.x option becomes visible and can be clicked
                ->assertVisible("[href*='2.x']")
                ->clickAndWaitForReload("[href*='2.x']")

                // will be redirected to 2.x documentation
                ->assertSee('This package is compatible with other Filament v2.x products')
        );
    }
}
