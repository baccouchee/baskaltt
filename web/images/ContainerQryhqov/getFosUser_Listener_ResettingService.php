<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'fos_user.listener.resetting' shared service.

include_once $this->targetDirs[2].'\\vendor\\friendsofsymfony\\user-bundle\\EventListener\\ResettingListener.php';

return $this->services['fos_user.listener.resetting'] = new \FOS\UserBundle\EventListener\ResettingListener(${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, 86400);
