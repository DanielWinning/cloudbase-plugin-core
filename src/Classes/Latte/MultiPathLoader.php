<?php

declare(strict_types=1);

namespace CloudBase\PluginCore\Classes\Latte;

use Latte\Loaders\FileLoader;
use Latte\TemplateNotFoundException;

class MultiPathLoader extends FileLoader
{
    public function getContent(string $fileName): string
    {
        $file = $this->baseDir . $fileName;

        if (!is_file($file)) {
            throw new TemplateNotFoundException("Missing template file '$file'.");
        } elseif ($this->isExpired($fileName, time())) {
            if (@touch($file) === false) {
                trigger_error("File's modification time is in the future. Cannot update it: " . error_get_last()['message'], E_USER_WARNING);
            }
        }

        return file_get_contents($file);
    }
}