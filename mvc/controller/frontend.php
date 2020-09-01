<?php

use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;
use OpenClassrooms\Blog\Model\MinichatManager;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MinichatManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function editComment($commentId)
{
    $commentManager = new CommentManager();

    $comment = $commentManager->getEditComment($commentId);

    require('view/frontend/editView.php');
}

function editedComment($updateId, $updateComment)
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

function miniChat($pseudo, $message)
{
    $minichatManager = new MinichatManager();

    $message = $minichatManager->dbMinichat($pseudo, $message);

    header('Location: index.php');
}
