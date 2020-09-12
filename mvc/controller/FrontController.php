<?php

use OpenClassrooms\Blog\Model\MembersManager;
use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;
use OpenClassrooms\Blog\Model\MinichatManager;

// Chargement des classes
require_once('Controller.php');
require_once('model/MembersManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MinichatManager.php');

class FrontController extends Controller
{
    public function incription()
    {
        $this->render("frontend/inscriptionView.php", [
            $this->getManager(MembersManager::class)->member()
        ]);
    }

    public function createNewMember()
    {
        $affectedLines = $this->getManager(MembersManager::class)->newMember($_POST["pseudo"], $_POST["password"], $_POST["email"]);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('index.php?action=connect');
        }
    }

    public function connect()
    {
        $this->render("frontend/connexionView.php", [
            $this->getManager(MembersManager::class)->connexion()
        ]);
    }

    public function newConnexion()
    {

        $resultat = $this->getManager(MembersManager::class)->newConnexion($_POST['pseudo']);

        var_dump(password_verify($_POST['password'], $resultat['pass']));

        if (password_verify($_POST['password'], $resultat['pass'])) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $this->redirect('index.php');
        } else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }

    public function deconnexion()
    {
        $_SESSION = array();
        session_destroy();

        $this->redirect("index.php");
    }

    public function listPosts()
    {
        $this->render("frontend/listPostsView.php", [
            "posts" => $this->getManager(PostManager::class)->getPosts()
        ]);
    }

    public function post()
    {
        if (!isset($_GET['id']) || $_GET['id'] === "") {
            throw new InvalidArgumentException();
        }
        $this->render("frontend/postView.php", [
            "post" => $this->getManager(PostManager::class)->getPost($_GET['id']),
            "comments" => $this->getManager(CommentManager::class)->getComments($_GET['id']),
        ]);
    }

    public function addPost()
    {
        $affectedLines = $this->getManager(PostManager::class)->addNewPost($_POST["title"], $_POST["content"]);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('index.php');
        }
    }

    public function editPost()
    {
        $this->render("frontend/editPostView.php", [
            "post" => $this->getManager(PostManager::class)->getEditPost($_GET["id"])
        ]);
    }

    public function editedPost()
    {
        $editUp = $this->getManager(PostManager::class)->returnEditPost($_GET["id"], $_POST["title"], $_POST["content"]);

        if ($editUp === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('index.php');
        }
    }

    public function addComment()
    {
        $affectedLines = $this->getManager(CommentManager::class)->postComment($_GET["id"], $_POST["author"], $_POST["comment"]);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('index.php?action=post&id=' . $_GET["id"]);
        }
    }

    public function editComment()
    {
        if (!isset($_GET['id']) || $_GET['id'] === "") {
            throw new InvalidArgumentException();
        }
        $this->render("frontend/editView.php", [
            "comment" => $this->getManager(CommentManager::class)->getEditComment($_GET["id"])
        ]);
    }

    public function editedComment()
    {
        $editUp = $this->getManager(CommentManager::class)->returnEditComment($_GET["id"], $_POST["comment"]);

        if ($editUp === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $comment = $this->getManager(CommentManager::class)->getEditComment($_GET["id"]);
            $this->redirect('index.php?action=post&id=' . $comment['post_id']);
        }
    }

    public function miniChat()
    {
        $this->getManager(MinichatManager::class)->dbMinichat($_SESSION['pseudo'], $_POST["message"]);

        $this->redirect('index.php');
    }
}
