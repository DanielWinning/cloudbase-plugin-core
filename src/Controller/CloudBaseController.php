<?php

declare(strict_types=1);

namespace CloudBase\PluginCore\Controller;

use CloudBase\PluginCore\Classes\Latte\EngineBuilder;
use CloudBase\PluginCore\CloudBase;
use Latte\Engine;
use Symfony\Component\HttpFoundation\Response;

class CloudBaseController
{
    private Engine $latteEngine;

    public function __construct()
    {
        $this->latteEngine = (new EngineBuilder())->getEngine();
    }

    protected function renderedLatteResponse(string $template, array $data = []): Response
    {
        if (!str_contains($template, '.latte')) {
            $template .= '.latte';
        }

        return new Response($this->latteEngine->renderToString($template, array_merge($data, [
            'app' => new CloudBase(),
        ])));
    }
}
