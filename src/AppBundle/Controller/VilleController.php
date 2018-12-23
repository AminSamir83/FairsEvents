<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Ville;
use AppBundle\Form\VilleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/ville")
 */

class VilleController extends Controller
{
    /**
     * @Route("/add",name="addvillepage")
     */
    public function addAction(Request $request,Ville $ville=null)
    {
        if(!$ville)
            $ville=new Ville();

        $form= $this->createForm(VilleType::class,$ville);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($ville);
            $em->flush();
            $this->addFlash('success','Ville ajoutée avec succès',
                array(
                    'form' => $form->createView()));
        }
        else {

        }


        return $this->render('@App/Ville/add.html.twig', array('form' => $form->createView())
            // ...
        );
    }

    /**
     * @Route("/delete", name="deletevillepage")
     */
    public function deleteAction()
    {
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Ville');
        $ville = $repository->find($id);


        if($ville){
            $em = $this->getDoctrine()->getManager();
            $em->remove($ville);
            $em->flush();
            $this->addFlash('success','Ville supprimée avec succès');
        }
        else {
            $this->addFlash('error','Erreur lors de la suppression de la ville');
        }



        return $this->forward('AppBundle:Ville:list');
    }

    /**
     * @Route("/update", name="updatevillepage")
     */
    public function updateAction(Request $request,Ville $ville=null)
    {
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Ville');
        $ville = $repository->find($id);

        $form= $this->createForm(VilleType::class,$ville);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($ville);
            $em->flush();
            $this->addFlash('success','Ville mise à jour avec succès',
                array(
                    'form' => $form->createView()));
        }
        else {

        }


        return $this->render('@App/Ville/update.html.twig', array('form' => $form->createView())
        // ...
        );
    }

    /**
     * @Route("/list", name="listvillepage")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Ville');
        $villes= $repository->findBy(array(), array('nom' => 'ASC'));
        return $this->render('@App/Ville/list.html.twig', array(
            'villes'=>$villes

        ));
    }

}
