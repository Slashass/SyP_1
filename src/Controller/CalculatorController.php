<?php

namespace App\Controller;

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

        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'Calculator',
            'result' => $result[0] ?? ''
            ]);
        }
        
    /**
     * @Route("/calculator", name="count", methods={"POST"})
     */
    public function counter(Request $r): Response
    {
        
        $session = new Session();
        $sum = $r->request->get('x') + $r->request->get('y');
        
        // irasom i sesija resuzltata
        // $session->set('result', $sum);
        
        // irasom i flashbag'a 
        $session->getFlashBag()->add('result', $sum);

        return $this->redirectToRoute('calculator');
        // dd($r->request->all());
    }
    
}
