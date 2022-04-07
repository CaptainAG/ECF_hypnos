<?php

namespace App\Controller\admin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/admin/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_user", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        $user = $userRepository->gerant();


        return $this->render('user/index.html.twig', [
            'users' => $user,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_user_new", methods= {"GET", "POST"})
     */
    public function new(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(["ROLE_GERANT"]);
            $user->setIsVerified('1');
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
            $userRepository->add($user);

            return $this->redirectToRoute('app_admin_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_user_edit", methods= {"GET", "POST"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        $pass = $user->getPassword();

        $pa = $user->setPassword($pass);




        if ($form->isSubmitted() && $form->isValid()) {

            if($form->get('password')->getData() != null){
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                            $user,
                            $form->get('password')->getData()
                        )
                    );
                $userRepository->add($user);
            }else{


                $user->setPassword($pass);

                $userRepository->add($user);

            }

            $userRepository->add($user);

            return $this->redirectToRoute('app_admin_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_user_delete", methods= {"POST"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user);
        }

        return $this->redirectToRoute('app_admin_user', [], Response::HTTP_SEE_OTHER);
    }

}
