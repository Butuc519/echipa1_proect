<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;

class UserController
{
    public function login(Request $request, Response $response, $args)
    {
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $email = $data['email'];
            $parola = $data['parola'];

            $user = User::where('email', $email)->first();

            if (!$user || !password_verify($parola, $user->parola)) {
                // Redirecționare cu mesaj de eroare
                return $response
                    ->withHeader('Location', '/users/login?error=invalid_credentials')
                    ->withStatus(302);
            }

            // Logica de autentificare
            session_start();
            $_SESSION['user_id'] = $user->id;

            return $response
                ->withHeader('Location', '/users/profile/' . $user->id)
                ->withStatus(302);
        }

        ob_start();
        require '../views/users/login.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }


    public function register(Request $request, Response $response, $args)
    {
        ob_start();
        require '../views/users/register.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $email = $data['email'];
        $parola = $data['parola'];
        $nume = $data['nume'];

        // Verificăm dacă emailul există deja
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            return $response
                ->withHeader('Location', '/users/register?error=email_taken')
                ->withStatus(302);
        }

        // Creăm un utilizator nou
        $user = new User();
        $user->nume = $nume;
        $user->email = $email;
        $user->parola = password_hash($parola, PASSWORD_BCRYPT);

        // Atribuim rolul de admin doar dacă emailul este cel specificat
        if ($email === 'admin@gmail.com') {
            $user->role = 'admin';
        } else {
            $user->role = 'user';  // Restul utilizatorilor vor avea rolul 'user'
        }

        $user->save();

        return $response
            ->withHeader('Location', '/users/login?success=account_created')
            ->withStatus(302);
    }



    public function profile(Request $request, Response $response, $args)
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $args['id']) {
            return $response->withHeader('Location', '/users/login')->withStatus(302);
        }
        $user = User::find($args['id']);
        ob_start();
        require '../views/users/profile.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function logout(Request $request, Response $response, $args)
    {
        session_start();
        session_destroy();
        error_log("Sesiunea a fost distrusă. User ID: " . ($_SESSION['user_id'] ?? 'None'));
        $_SESSION = [];
        return $response->withHeader('Location', '/')->withStatus(302);
    }


}
