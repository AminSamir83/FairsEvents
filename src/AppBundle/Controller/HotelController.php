<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Hotel;
use AppBundle\Form\HotelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/hotel")
 */

class HotelController extends Controller
{
    /**
     * @Route("/add",name="addHotelPage")
     */
    public function addAction(Request $request, Hotel $hotel=null)
    {
        if(!$hotel)
            $hotel=new Hotel();

        $form= $this->createForm(HotelType::class,$hotel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($hotel);
            $em->flush();
            $this->addFlash('success','Hotel ajoutée avec succès');
        }
        else {

        }

        return $this->render('@App/Hotel/add.html.twig', array(
            'form' => $form->createView()));
    }

    /**
     * @Route("/update", name="updatehotelpage")
     */
    public function updateAction(Request $request,Hotel $hotel=null)
    {
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Hotel');
        $hotel = $repository->find($id);
        $form= $this->createForm(HotelType::class,$hotel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($hotel);
            $em->flush();
            $this->addFlash('success','Hotel mis à jour avec succès');
        }
        else {

        }
        return $this->render('@App/Hotel/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }



    /**
     * @Route("/delete", name="deletehotelpage")
     */
    public function deleteAction()
    {
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Hotel');
        $hotel = $repository->find($id);


        if($hotel){
            $em = $this->getDoctrine()->getManager();
            $em->remove($hotel);
            $em->flush();
            $this->addFlash('success','Hotel supprimée avec succès');
        }
        else {
            $this->addFlash('error',"Erreur lors de la suppression de l'hotel");
        }



        return $this->forward('AppBundle:Hotel:list');
    }

    /**
     * @Route("/list",name="listhotelpage")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Hotel');
        $hotels= $repository->findAll();
        return $this->render('@App/Hotel/list.html.twig', array(
            'hotels'=>$hotels

        ));
    }

}
