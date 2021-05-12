<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController {

    /**
     * @var EntityManagerInterface
     */
    private $manager;

    /**
     * @var FilmRepository
     */
    private $filmRepository;

    
    public function __construct(EntityManagerInterface $manager, FilmRepository $filmRepository, ) {
        
        $this->manager = $manager;
        $this->filmRepository = $filmRepository;
    }

    /**
     * @Route("/", name="accueil")
     */
    public function home(Request $request) {

        $listefilm = $this->filmRepository->findAll();

        return $this->render("accueil.html.twig", ['listefilm' => $listefilm]);
    }
}