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
        $this->render("frontend/listPostView.php", [
            "posts" => $this->getManager(PostManager::class)->getPosts()
        ]);
    }

    public function post()
    {
        $this->render("frontend/listPostView.php", [
            "post" => $this->getManager(PostManager::class)->getPost($_GET['id']),
            "comments" => $this->getManager(CommentManager::class)->getComments($_GET['id']),
        ]);
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('index.php?action=post&id=' . $postId);
        }
    }

    public function editComment($commentId)
    {
        $commentManager = new CommentManager();

        $comment = $commentManager->getEditComment($commentId);

        require('view/frontend/editView.php');
    }

    public function editedComment($updateId, $updateComment)
    {
        $commentManager = new CommentManager();

        $editUp = $commentManager->returnEditComment($updateId, $updateComment);

        if ($editUp === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $comment = $commentManager->getEditComment($updateId);
            header('Location: index.php?action=post&id=' . $comment['post_id']);
        }
    }

    public function miniChat($pseudo, $message)
    {
        $minichatManager = new MinichatManager();

        $message = $minichatManager->dbMinichat($pseudo, $message);

        header('Location: index.php');
    }
}
