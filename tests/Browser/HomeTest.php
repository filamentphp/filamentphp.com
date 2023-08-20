<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class HomeTest extends DuskTestCase
{
    /**
     * @throws Throwable
     */
    public function testHomePageIsOk(): void
    {
        $this->browse(
            fn (Browser $browser) => $browser
                ->visitRoute('home')
                ->assertSee('Get Started')
        );
    }
}
