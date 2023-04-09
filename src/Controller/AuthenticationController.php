<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LoginFormType;
use App\Repository\MembresRepository;
use App\Security\CustomAuth;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ComptesAcRepository;

class AuthenticationController extends AbstractController
{
    #[Route('/connexion', name: 'app_authentication')]
    public function index(Request $request, MembresRepository $membresRepository): Response
    {
        if(CustomAuth::isConnected($request)){return $this->redirectToRoute('app_profile');}
        $form = $this->createForm(LoginFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $result = $form->getData();
            $authLogic = new CustomAuth($result["password"], $result["email"], $membresRepository, $request);
            if($authLogic->authentification()) {
                $authLogic->loadAuthentication(); 
                return $this->redirectToRoute('app_profile');
            } else {
                $this->addFlash('notice', "Erreur ! Votre mot de passe est incorrect.");
                return $this->redirectToRoute('app_authentication');
            }
        }
        return $this->render('authentication/index.html.twig', [
            "form" => $form
        ]);
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(Request $request, MembresRepository $membresRepository, ComptesAcRepository $comptesAcRepository): Response
    {
        if(!CustomAuth::isConnected($request)){return $this->redirectToRoute('app_authentication');}
        $session = $request->getSession();
        $memberId = $session->get("userid");
        $Member = $membresRepository->findOneBy(["numMembres" => $memberId]);
        $CompteAc = $comptesAcRepository->findAll(["numMembres" => $memberId]);
        return $this->render('authentication/profile.html.twig', [
            "logoff" => CustomAuth::isConnected($request),
            "membre" => $Member,
            "compte" => $CompteAc
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(SessionInterface $session): Response
    {
        $session->clear();
        $response = new Response();
        $cookie = new Cookie("auth", null, time() + (1000), "/");
        $response->setStatusCode(Response::HTTP_FOUND);
        $response->headers->set('Location', '/');
        $response->headers->setCookie($cookie);
        return $response->send();
    }
}
