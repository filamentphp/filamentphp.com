<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class CommunityTest extends DuskTestCase
{
    /**
     * @throws Throwable
     */
    public function testCommunityLandingPageIsOk(): void
    {
        $this->browse(
            fn (Browser $browser) => $browser
                ->visitRoute('articles')
                ->assertSee('Community')
        );
    }
}
