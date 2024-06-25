<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/aleatorio', name: 'app_aleatorio_')]
class AleatorioController extends AbstractController
{
    #[Route('/ej1', name: 'aleatorio1')]
    public function index(): Response
    {
        return $this->render('aleatorio/index.html.twig', [
            'controller_name' => 'Mis Aleatorios',
        ]);
    }

    #[Route('/ej2', name: 'aleatorio2')]
    public function index2(): Response
    {
        return $this->render('aleatorio/index.html.twig', [
            'controller_name' => 'Pagina2 Aleatorios',
        ]);
    }

    
    public function index3(): Response
    {
        return $this->render('aleatorio/index.html.twig', [
            'controller_name' => 'Pagina3 YAML',
        ]);
    }

    // Este enrutado es una anotación
    #[Route('/ej4/{num1}/{num2}', name: 'aleatorio4')]
    public function index4(int $num1, int $num2): Response
    {
        $aleatorio = rand($num1, $num2);

        return $this->render('aleatorio/index.html.twig', [
            'aleatorio' => $aleatorio,
        ]);
    }

    // En el enrutamiento, el YAML tiene preferencia
    public function index5(int $num1, int $num2): Response
    {
        $aleatorio = rand($num1, $num2);

        return $this->render('aleatorio/index.html.twig', [
            'aleatorio' => $aleatorio,
        ]);
    }
}
