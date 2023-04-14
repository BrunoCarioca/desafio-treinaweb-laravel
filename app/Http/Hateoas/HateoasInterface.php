<?php

namespace App\Http\Hateoas;

use Illuminate\Database\Eloquent\Model;

interface HateoasInterface
{
    public function getLinks(?Model $recurso): array;
}
