<?php

namespace Bdbch\StatamicComponents\Modifiers;

use Statamic\Modifiers\Modifier;
use Statamic\Facades\Parse;
use Statamic\Facades\File;

class Components extends Modifier
{
    /**
     * Modify a value.
     *
     * @param mixed  $value    The value to be modified
     * @param array  $params   Any parameters used in the modifier
     * @param array  $context  Contextual values
     * @return mixed
     */
    public function index($value, $params, $context)
    {
        $content = join(array_map(function ($item) {
            $template = File::disk('resources')->get("views/components/{$item['type']}/index.antlers.html");
            if (!$template) {
                return '';
            }
            $content = Parse::template(File::disk('resources')->get("views/components/{$item['type']}/index.antlers.html"), $item);
            return $content;
        }, $value));

        return $content;
    }
}