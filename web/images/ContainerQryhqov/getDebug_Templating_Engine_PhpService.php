<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'debug.templating.engine.php' shared service.

include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Templating\\EngineInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Templating\\PhpEngine.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\FrameworkBundle\\Templating\\EngineInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\FrameworkBundle\\Templating\\PhpEngine.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\FrameworkBundle\\Templating\\TimedPhpEngine.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\FrameworkBundle\\Templating\\GlobalVariables.php';

$this->services['debug.templating.engine.php'] = $instance = new \Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine(${($_ = isset($this->services['templating.name_parser']) ? $this->services['templating.name_parser'] : ($this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'}))) && false ?: '_'}, new \Symfony\Component\DependencyInjection\ServiceLocator(['nomaya.socialBarHelper' => function () {
    return ${($_ = isset($this->services['nomaya.socialBarHelper']) ? $this->services['nomaya.socialBarHelper'] : $this->load('getNomaya_SocialBarHelperService.php')) && false ?: '_'};
}, 'nomaya.socialLinksHelper' => function () {
    return ${($_ = isset($this->services['nomaya.socialLinksHelper']) ? $this->services['nomaya.socialLinksHelper'] : $this->load('getNomaya_SocialLinksHelperService.php')) && false ?: '_'};
}, 'templating.helper.actions' => function () {
    return ${($_ = isset($this->services['templating.helper.actions']) ? $this->services['templating.helper.actions'] : $this->load('getTemplating_Helper_ActionsService.php')) && false ?: '_'};
}, 'templating.helper.assets' => function () {
    return ${($_ = isset($this->services['templating.helper.assets']) ? $this->services['templating.helper.assets'] : $this->load('getTemplating_Helper_AssetsService.php')) && false ?: '_'};
}, 'templating.helper.code' => function () {
    return ${($_ = isset($this->services['templating.helper.code']) ? $this->services['templating.helper.code'] : $this->load('getTemplating_Helper_CodeService.php')) && false ?: '_'};
}, 'templating.helper.form' => function () {
    return ${($_ = isset($this->services['templating.helper.form']) ? $this->services['templating.helper.form'] : $this->load('getTemplating_Helper_FormService.php')) && false ?: '_'};
}, 'templating.helper.logout_url' => function () {
    return ${($_ = isset($this->services['templating.helper.logout_url']) ? $this->services['templating.helper.logout_url'] : $this->load('getTemplating_Helper_LogoutUrlService.php')) && false ?: '_'};
}, 'templating.helper.request' => function () {
    return ${($_ = isset($this->services['templating.helper.request']) ? $this->services['templating.helper.request'] : $this->load('getTemplating_Helper_RequestService.php')) && false ?: '_'};
}, 'templating.helper.router' => function () {
    return ${($_ = isset($this->services['templating.helper.router']) ? $this->services['templating.helper.router'] : $this->load('getTemplating_Helper_RouterService.php')) && false ?: '_'};
}, 'templating.helper.security' => function () {
    return ${($_ = isset($this->services['templating.helper.security']) ? $this->services['templating.helper.security'] : $this->load('getTemplating_Helper_SecurityService.php')) && false ?: '_'};
}, 'templating.helper.session' => function () {
    return ${($_ = isset($this->services['templating.helper.session']) ? $this->services['templating.helper.session'] : $this->load('getTemplating_Helper_SessionService.php')) && false ?: '_'};
}, 'templating.helper.slots' => function () {
    return ${($_ = isset($this->services['templating.helper.slots']) ? $this->services['templating.helper.slots'] : ($this->services['templating.helper.slots'] = new \Symfony\Component\Templating\Helper\SlotsHelper())) && false ?: '_'};
}, 'templating.helper.stopwatch' => function () {
    return ${($_ = isset($this->services['templating.helper.stopwatch']) ? $this->services['templating.helper.stopwatch'] : $this->load('getTemplating_Helper_StopwatchService.php')) && false ?: '_'};
}, 'templating.helper.translator' => function () {
    return ${($_ = isset($this->services['templating.helper.translator']) ? $this->services['templating.helper.translator'] : $this->load('getTemplating_Helper_TranslatorService.php')) && false ?: '_'};
}]), ${($_ = isset($this->services['templating.loader']) ? $this->services['templating.loader'] : $this->load('getTemplating_LoaderService.php')) && false ?: '_'}, ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'}, ${($_ = isset($this->services['templating.globals']) ? $this->services['templating.globals'] : ($this->services['templating.globals'] = new \Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables($this))) && false ?: '_'});

$instance->setCharset('UTF-8');
$instance->setHelpers(['slots' => 'templating.helper.slots', 'request' => 'templating.helper.request', 'session' => 'templating.helper.session', 'router' => 'templating.helper.router', 'assets' => 'templating.helper.assets', 'actions' => 'templating.helper.actions', 'code' => 'templating.helper.code', 'translator' => 'templating.helper.translator', 'form' => 'templating.helper.form', 'stopwatch' => 'templating.helper.stopwatch', 'logout_url' => 'templating.helper.logout_url', 'security' => 'templating.helper.security', 'social-buttons' => 'nomaya.socialBarHelper', 'social-links' => 'nomaya.socialLinksHelper']);

return $instance;
