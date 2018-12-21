<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HotelController extends Controller
{
    /**
     * @Route("/addHotel",name="addHotelPage")
     */
    public function addAction()
    {

        return $this->render('ApppBundle:Hotel:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("updateHotel")
     */
    public function updateAction()
    {
        return $this->render('AppBundle:Hotel:update.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("deleteHotel")
     */
    public function deleteAction()
    {
        return $this->render('AppBundle:Hotel:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("listHotel")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Hotel:list.html.twig', array(
            // ...
        ));
    }

}
