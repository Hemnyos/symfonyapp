<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/password/encoder')]
class UserPasswordEncoderController extends AbstractController
{
    #[Route('/', name: 'app_user_password_encoder_index', methods: ['GET'])]
/**
 * @Route("/new", name="utilisateur_new", methods={"GET","POST"})
 */
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('user_password_encoder/index.html.twig', [
            'utilisateurs' => $utilisateurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_password_encoder_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UtilisateurRepository $utilisateurRepository): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            //encodage du mot de passe
            $utilisateur->setPassword(
            $userPasswordEncoder->encodePassword($utilisateur, $utilisateur->getPassword()));
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index');
    }

    return $this->render('utilisateur/new.html.twig', [
    'utilisateur' => $utilisateur,
    'form' => $form->createView(),
    ]);
    }

    #[Route('/{id}', name: 'app_user_password_encoder_show', methods: ['GET'])]
    public function show(Utilisateur $utilisateur): Response
    {
        return $this->render('user_password_encoder/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_password_encoder_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateurRepository->save($utilisateur, true);

            return $this->redirectToRoute('app_user_password_encoder_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_password_encoder/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_password_encoder_delete', methods: ['POST'])]
    public function delete(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->request->get('_token'))) {
            $utilisateurRepository->remove($utilisateur, true);
        }

        return $this->redirectToRoute('app_user_password_encoder_index', [], Response::HTTP_SEE_OTHER);
    }
    
    
}
