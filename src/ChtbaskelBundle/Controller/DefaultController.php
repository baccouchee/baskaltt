<?php

namespace ChtbaskelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('chtbaskel_afficherMapFront'));
    }
}
