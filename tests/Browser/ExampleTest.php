<?php

namespace Tests\Browser;

use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                ->visit('/recette/ajout')
                ->waitForText('Créez votre recette')
                ->type('input#title', 'taylor@laravel.com')
                ->assertSee('Créez votre recette');
        });
    }
}
