<?php

namespace App\Controller;

use App\Entity\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;


class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator", methods={"GET"})
     */
    public function index(): Response
    {
        $session = new Session();

        // paemam is flashbago 
        $result = $session->getFlashBag()->get('result', []);

        // nuskaitymas is db visu objektu
        $res=$this->getDoctrine()
            ->getRepository(Result::class)
            ->findAll();

        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'Calculator',
            'result' => $result[0] ?? '',
            'history' => $res
            ]);
        }

    /**
     * @Route("/calculator", name="count", methods={"POST"})
     */
    public function counter(Request $r): Response
    {
        
        $session = new Session();
        $sum = $r->request->get('x') + $r->request->get('y');
        

        // irasinejam rez i db
        // sukuriam entity obj
        $res = new Result;
        // irasom savybes kurias noriam isaugot
        $res->
        setEnter1($r->request->get('x'))->
        setEnter2($r->request->get('y'))->
        setRes($sum);
        // sukuriam manager
        $entityManager = $this->getDoctrine()->getManager();
        // kaip prepare paruosia i db, issiunciam i db
        $entityManager->persist($res);
        // Iraso i db
        $entityManager->flush();

        // irasom i sesija resuzltata
        // $session->set('result', $sum);
        
        // irasom i flashbag'a 
        $session->getFlashBag()->add('result', $sum);

        return $this->redirectToRoute('calculator');
        // dd($r->request->all());
    }
    
}
