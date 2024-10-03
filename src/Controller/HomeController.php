<?php

// src/Controller/HomeController.php

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MediaRepository $mediaRepository): Response
    {
        // Par exemple, récupérer les films ou séries populaires
        $media = $mediaRepository->findBy([], ['releaseDate' => 'DESC'], 10);

        return $this->render('home/index.html.twig', [
            'media' => $media,
        ]);
    }
}
