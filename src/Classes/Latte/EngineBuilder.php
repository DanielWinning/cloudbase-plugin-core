<?php

declare(strict_types=1);

namespace CloudBase\PluginCore\Classes\Latte;

use CloudBase\PluginCore\CloudBase;
use Latte\Engine;

class EngineBuilder
{
    private const string DEFAULT_VIEWS_DIRECTORY = '%s/views';

    public function getEngine(string $packageName = null): Engine
    {
        $latte = new Engine();
        $latte->setTempDirectory(sprintf('%s/var/cache/latte', $_ENV['APP_BASE_PATH']));

        $viewsDirectory = $packageName
            ? sprintf('%s/vendor/%s/views', $_ENV['APP_BASE_PATH'], $packageName)
            : CloudBase::getBaseViewsDirectory();

        $fileLoader = new MultiPathLoader($viewsDirectory);

        $latte->setLoader($fileLoader);

        return $latte;
    }

    private function getDefaultViewsDirectory(): string
    {
        return sprintf(self::DEFAULT_VIEWS_DIRECTORY, $_ENV['APP_BASE_PATH']);
    }
}