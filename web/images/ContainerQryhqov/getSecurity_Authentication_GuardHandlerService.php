<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.authentication.guard_handler' shared service.

include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Security\\Guard\\GuardAuthenticatorHandler.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Security\\Http\\Session\\SessionAuthenticationStrategyInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Security\\Http\\Session\\SessionAuthenticationStrategy.php';

$this->services['security.authentication.guard_handler'] = $instance = new \Symfony\Component\Security\Guard\GuardAuthenticatorHandler(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'}, ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}, []);

$instance->setSessionAuthenticationStrategy(${($_ = isset($this->services['security.authentication.session_strategy.main']) ? $this->services['security.authentication.session_strategy.main'] : ($this->services['security.authentication.session_strategy.main'] = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate'))) && false ?: '_'});

return $instance;
