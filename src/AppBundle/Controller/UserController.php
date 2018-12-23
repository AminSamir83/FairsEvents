<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * @Route("/listUser",name="listUserPage")
     */
    public function listUserAction()
    {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render('@App/User/list.html.twig', array(
            'users' => $users
        ));
    }

    /**
     * @Route("/update",name="updateuserpage")
     */
    public function updateAction(Request $request, User $user=null)
    {
        $id=$_GET['id'];
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));
        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('success','User mis à jour avec succès');
        }

        return $this->render('@App/User/update.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/delete", name="deleteuserpage")
     */
    public function deleteAction()
    {
        $id=$_GET['id'];
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));


        if($user){
            $userManager->deleteUser($user);
            $this->addFlash('success','User supprimée avec succès');
        }
        else {
            $this->addFlash('error',"Erreur lors de la suppression de l'utilisateur");
        }



        return $this->forward('AppBundle:User:list');
    }



}
