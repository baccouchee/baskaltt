<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'fos_user.username_form_type' shared service.

include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\FormTypeInterface.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\AbstractType.php';
include_once $this->targetDirs[2].'\\vendor\\friendsofsymfony\\user-bundle\\Form\\Type\\UsernameFormType.php';
include_once $this->targetDirs[2].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Form\\DataTransformerInterface.php';
include_once $this->targetDirs[2].'\\vendor\\friendsofsymfony\\user-bundle\\Form\\DataTransformer\\UserToUsernameTransformer.php';

return $this->services['fos_user.username_form_type'] = new \FOS\UserBundle\Form\Type\UsernameFormType(new \FOS\UserBundle\Form\DataTransformer\UserToUsernameTransformer(${($_ = isset($this->services['fos_user.user_manager']) ? $this->services['fos_user.user_manager'] : $this->load('getFosUser_UserManagerService.php')) && false ?: '_'}));
