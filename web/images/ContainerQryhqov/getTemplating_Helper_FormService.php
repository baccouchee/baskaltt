<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'templating.helper.form' shared service.

include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Templating\\Helper\\HelperInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Templating\\Helper\\Helper.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\FormHelper.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\FormRendererInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\FormRenderer.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\FormRendererEngineInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\AbstractRendererEngine.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\Extension\\Templating\\TemplatingRendererEngine.php';

return $this->services['templating.helper.form'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper(new \Symfony\Component\Form\FormRenderer(new \Symfony\Component\Form\Extension\Templating\TemplatingRendererEngine(${($_ = isset($this->services['debug.templating.engine.php']) ? $this->services['debug.templating.engine.php'] : $this->load('getDebug_Templating_Engine_PhpService.php')) && false ?: '_'}, $this->parameters['templating.helper.form.resources']), ${($_ = isset($this->services['security.csrf.token_manager']) ? $this->services['security.csrf.token_manager'] : $this->load('getSecurity_Csrf_TokenManagerService.php')) && false ?: '_'}));
