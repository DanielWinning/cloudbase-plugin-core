<?php

declare(strict_types=1);

namespace CloudBase\PluginCore;

class CloudBase
{
    public static function getBaseViewsDirectory(): string
    {
        return sprintf('%s/views', $_ENV['APP_BASE_PATH']);
    }
}
