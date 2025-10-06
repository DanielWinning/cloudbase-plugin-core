<?php

declare(strict_types=1);

namespace CloudBase\PluginCore\Classes\Latte;

use CloudBase\PluginCore\CloudBase;
use Latte\Engine;

class EngineBuilder
{
    private const string DEFAULT_VIEWS_DIRECTORY = '%s/views';

    public function getEngine(): Engine
    {
        $latte = new Engine();
        $fileLoader = new MultiPathLoader('');

        $latte->setTempDirectory(sprintf('%s/var/cache/latte', $_ENV['APP_BASE_PATH']));
        $latte->setLoader($fileLoader);

        return $latte;
    }

    private function getDefaultViewsDirectory(): string
    {
        return sprintf(self::DEFAULT_VIEWS_DIRECTORY, $_ENV['APP_BASE_PATH']);
    }
}
