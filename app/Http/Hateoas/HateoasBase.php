<?php

namespace App\Http\Hateoas;

class  HateoasBase
{
    protected array $links = [];

    protected function addLink(
        string $method,
        string $rel,
        string $href,
        array $param_route = []): void
    {
        $this->links[] = [
            'method' => $method,
            'rel' => $rel,
            'href' => $href,
        ];
    }
}
