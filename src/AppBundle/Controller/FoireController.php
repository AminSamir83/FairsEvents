<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Foire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\FoireType;
use Symfony\Component\HttpFoundation\File;

/**
 * @Route("/foire")
 */
class FoireController extends Controller
{
    /**
     * @Route("/add", name="addfoirepage")
     */
    public function addAction(Request $request,Foire $foire=null)
    {
        if(!$foire)
          $foire=new Foire();

        $form= $this->createForm(FoireType::class,$foire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['image']->getData();

            $newImageName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('foire_images'), $newImageName);
            $foire->setImage($newImageName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($foire);
            $em->flush();
            $this->addFlash('success','Foire ajoutée avec succès');
        }
        else {

        }

            return $this->render('@App/Foire/add.html.twig', array(
                'form' => $form->createView()));
    }

    /**
     * @Route("/delete",name="deletefoirepage")
     */
    public function deleteAction()
    {
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Foire');
        $foire = $repository->find($id);


        if($foire){
            $em = $this->getDoctrine()->getManager();
            $em->remove($foire);
            $em->flush();
            $this->addFlash('success','Foire supprimée avec succès');
        }
        else {
            $this->addFlash('error','Erreur lors de la suppression de la foire');
        }



        return $this->forward('AppBundle:Foire:list');
    }

    /**
     * @Route("/list", name="listfoirepage")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Foire');
        $foires= $repository->findAll();
        return $this->render('@App/Foire/list.html.twig', array(
            'foires'=>$foires

        ));
    }

    /**
     * @Route("/update", name="updatefoirepage")
     */
    public function updateAction()
    {
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Foire');
        $foire = $repository->find($id);
        if($foire){
            $foire->setImage();
        }
        return $this->render('AppBundle:Foire:update.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/show", name="showfoirepage")
     */
    public function showAction(Request $request,Foire $foire=null)
    {
        $this->addFlash('init','Etat initial');
        $id=$_GET['id'];
        $repository= $this->getDoctrine()->getRepository('AppBundle:Foire');
        $foire = $repository->find($id);
        $form= $this->createForm(FoireType::class,$foire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $file = $form['image']->getData();

            $newImageName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('foire_images'),$newImageName);
            $foire->setImage($newImageName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($foire);
            $em->flush();
            $this->addFlash('success','Foire mise à jour avec succès');
        }
        else {

        }
        return $this->render('@App/Foire/update.html.twig', array(
            'form'=>$form->createView()
        ));
    }

}
