<?php

declare(strict_types=1);

namespace CloudBase\PluginCore\Controller;

use CloudBase\PluginCore\Classes\Latte\EngineBuilder;
use Latte\Engine;
use Symfony\Component\HttpFoundation\Response;

class CloudBaseController
{
    private Engine $latteEngine;

    public function __construct(string $packageName = null)
    {
        $this->latteEngine = (new EngineBuilder())->getEngine($packageName);
    }

    protected function renderedLatteResponse(string $template, array $data = []): Response
    {
        if (!str_contains($template, '.latte')) {
            $template .= '.latte';
        }

        return new Response($this->latteEngine->renderToString($template, $data));
    }
}
