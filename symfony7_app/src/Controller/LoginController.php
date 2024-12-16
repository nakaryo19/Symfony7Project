<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // ログインエラー取得
        $error = $authenticationUtils->getLastAuthenticationError();

        // 最後に入力されたユーザー名
        $lastUsername = $authenticationUtils->getLastUsername();

        // ユーザーがログインしている場合は /topPage にリダイレクト
        if ($this->getUser()) {
            return $this->redirectToRoute('app_top_page');
        }

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    // #[Route('/logout', name: 'app_logout')]
    // public function logout(): void
    // {
    //     // ログアウト処理はSymfonyが自動で行います。
    //     throw new \LogicException('このメソッドはセキュリティ設定によって処理されます。');
    // }
}
