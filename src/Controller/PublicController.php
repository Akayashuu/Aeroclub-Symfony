<?php

namespace App\Controller;

use App\Repository\AvionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Security\CustomAuth;

class PublicController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(Request $request): Response
    {
        return $this->render('public/index.html.twig', [
            "logoff" => CustomAuth::isConnected($request)
        ]);
    }

    #[Route('/avions', name: 'app_planes')]
    public function planes(AvionsRepository $avionsRepository, Request $request): Response
    {
        $Avions = $avionsRepository->findBy(array(), null, 4);
        return $this->render('public/planes.html.twig', [
            "avions" => $Avions,
            "logoff" => CustomAuth::isConnected($request)
        ]);
    }
}
