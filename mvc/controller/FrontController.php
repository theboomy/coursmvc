<?php

use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;
use OpenClassrooms\Blog\Model\MinichatManager;

// Chargement des classes
require_once('Controller.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MinichatManager.php');

class FrontController extends Controller
{
    public function listPosts()
    {
        $this->render("frontend/listPostsView.php", [
            "posts" => $this->getManager(PostManager::class)->getPosts()
        ]);
    }

    public function post()
    {
        $this->render("frontend/postView.php", [
            "post" => $this->getManager(PostManager::class)->getPost($_GET['id']),
            "comments" => $this->getManager(CommentManager::class)->getComments($_GET['id']),
        ]);
    }

    public function addComment()
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($_GET["id"], $_POST["author"], $_POST["comment"]);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('index.php?action=post&id=' . $_GET["id"]);
        }
    }

    public function editComment()
    {
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
        $message = $this->getManager(MinichatManager::class)->dbMinichat($_POST["pseudo"], $_POST["message"]);

        $this->redirect('index.php');
    }
}
