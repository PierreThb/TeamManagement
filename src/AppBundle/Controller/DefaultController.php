<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 23/04/2016
 * Time: 19:25
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/menu",name="_menu")
     */
    public function goToIndexAction(Request $request)
    {
        return $this->render('index.html.twig');
    }
}