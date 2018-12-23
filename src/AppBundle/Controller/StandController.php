<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stand;
use AppBundle\Form\StandType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/stand")
 */
class StandController extends Controller
{
    /**
     * @Route("/add", name="addstandpage")
     */
    public function addAction(Request $request, Stand $stand=null)
    {

        if(!$stand)
            $stand=new Stand();

        $form= $this->createForm(StandType::class,$stand);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($stand);
            $em->flush();
            $this->addFlash('success','Stand ajouté avec succès',
                array(
                    'form' => $form->createView()));
        }
        else {

        }
        return $this->render('@App/Stand/add.html.twig', array(
            'form' => $form->createView()));
    }

    /**
     * @Route("/delete",name="deletestandpage")
     */
    public function deleteAction()
    {
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Stand');
        $stand = $repository->find($id);


        if($stand){
            $em = $this->getDoctrine()->getManager();
            $em->remove($stand);
            $em->flush();
            $this->addFlash('success','Stand supprimée avec succès');
        }
        else {
            $this->addFlash('error','Erreur lors de la suppression du stand');
        }



        return $this->forward('AppBundle:Stand:list');
    }


    /**
     * @Route("/list", name="liststandpage")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Stand');
        $stands= $repository->findAll();
        return $this->render('@App/Stand/list.html.twig', array(
            'stands'=>$stands

        ));
    }

    /**
     * @Route("/update", name="updatestandpage")
     */
    public function updateAction(Request $request,Stand $stand=null)
    {

        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Stand');
        $stand = $repository->find($id);
        $form= $this->createForm(StandType::class,$stand);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($stand);
            $em->flush();
            $this->addFlash('success','Stand mis à jour avec succès');
        }
        else {

        }
        return $this->render('@App/Stand/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }


}
