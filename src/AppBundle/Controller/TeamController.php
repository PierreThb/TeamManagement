<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 12/04/2016
 * Time: 11:36
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Project;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TeamController extends Controller
{
    /**
     * @Route("/teampage",name="_team")
     */
    public function teamPageAction(Request $request)
    {
        $user = $this->getUser();
        $userId = $user->getId();
        $arrayprj = new ArrayCollection();


        $repository = $this->getDoctrine()->getRepository(Project::class);

        $listp = $repository->findAll(); //get all project

        foreach ($listp as $prj){ //browse the array of project
            $participant = $prj->getUsers(); //get all users or the project
            foreach ($participant as $p){ //browse the array of user
                if ($p == $user){ //if equal our user
                    $arrayprj[] = $prj; //add the project to the list of project of the user
                }
            }
        }

        $listProjetlock = new ArrayCollection();
        $listProjetUnlock = new ArrayCollection();

        foreach ($arrayprj as $pr){
            if ($pr->getIslocked() == true){
                $listProjetlock[] = $pr;
            }else{
                $listProjetUnlock[] = $pr;
            }
        }

        /*
        $listProjetUnlock = $repository->findBy(array(
            'leader'=>$userId,
            'islocked'=>false
        ));

        $listProjetlock = $repository->findBy(array(
            'leader'=>$userId,
            'islocked'=>true
        ));*/

        return $this->render(':teampage:team.html.twig',array(
            'listprojectunlock'=>$listProjetUnlock,
            'listprojectlock'=>$listProjetlock
        ));
    }
}