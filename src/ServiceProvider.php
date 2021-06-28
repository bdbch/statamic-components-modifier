<?php

namespace Bdbch\StatamicComponents;

require(__DIR__ . '/modifiers/Components.php');

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $modifiers = [
        \Bdbch\StatamicComponents\Modifiers\Components::class
    ];

    
}
