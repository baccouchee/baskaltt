<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'translation.warmer' shared service.

include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\HttpKernel\\CacheWarmer\\CacheWarmerInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TranslationsCacheWarmer.php';

return $this->services['translation.warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TranslationsCacheWarmer((new \Symfony\Component\DependencyInjection\ServiceLocator(['translator' => function () {
    return ${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'};
}]))->withContext('translation.warmer', $this));
