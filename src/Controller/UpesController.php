<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpesController extends AbstractController
{
    public function bebras(Request $r, string $pasveikinimas, int $kiekis): Response
    {

        $udraUrl = $this->generateUrl('udra');
        $order = $r->query->get('order');

        return $this->render('upe/bebras.html.twig', [
            'say' => $pasveikinimas,
            'count' => $kiekis,
            'go' => $udraUrl,
            'o' => $order
        ]);
    }
    public function udra(): Response
    {

        $bebrasUrl = $this->generateUrl('bebras', ['pasveikinimas' => 'Viso-Gero', 'kiekis' => 100]);

        return $this->render('upe/udra.html.twig', [
            'go' => $bebrasUrl
        ]);
    }
}
