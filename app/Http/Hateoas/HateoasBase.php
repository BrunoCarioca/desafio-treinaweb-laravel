<?php

namespace App\Http\Hateoas;

class  HateoasBase
{
    protected array $links = [];

    /**
     * Add the value of links
     */
    protected function addLink(
        string $method,
        string $rel,
        string $uri,
        array $param_route = []): void
    {
        $this->links[] = [
            'method' => $method,
            'rel' => $rel,
            'uri' => route($uri, $param_route)
        ];
    }

    protected function AddLinkProvisorio(
        string $method,
        string $rel,
        string $uri,
        int $param_route = null): void
    {
        $this->links[] = [
            'method' => $method,
            'rel' => $rel,
            'uri' => $uri.'/'.$param_route
        ];
    }
}
