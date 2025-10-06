<?php

declare(strict_types=1);

namespace CloudBase\PluginCore;

class CloudBase
{
    public static function getBaseViewsDirectory(): string
    {
        return sprintf('%s/views', $_ENV['APP_BASE_PATH']);
    }

    public function getCoreLayout(string $layout = null): string
    {
        return sprintf('%s/views/layout/%s.layout.latte', $_ENV['APP_BASE_PATH'], $layout ?? 'cloudbase');
    }
}
