<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class ConsultingTest extends DuskTestCase
{
    /**
     * @throws Throwable
     */
    public function testConsultingPageIsOk(): void
    {
        $this->browse(
            fn (Browser $browser) => $browser
                ->visitRoute('consulting')
                ->assertSee('Consulting')
        );
    }
}
