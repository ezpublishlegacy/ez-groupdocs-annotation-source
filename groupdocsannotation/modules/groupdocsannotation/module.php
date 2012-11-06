<?php

$Module = array( 'name' => 'groupdocsannotation' );

$ViewList = array();
$ViewList['config'] = array(
'script' => 'config.php',
//"unordered_params" => array( "offset" => "Offset" ) 
);
/*
$ViewList['add'] = array(
                   'functions' => array( 'add' ),
                   'script' => 'add.php',
                   'params' => array(),
                   'single_post_actions' => array( 'AddCommentButton' => 'AddComment' ),
                   );

$ViewList['edit'] = array(
                   'functions' => array( 'edit' ),
                   'script' => 'edit.php',
                   'single_post_actions' => array( 'UpdateCommentButton' => 'UpdateComment',
                                                   'CancelButton'=>'Cancel' ),
                   'params' => array( 'CommentID' ),
                   );
$ViewList['delete'] = array(
                   'functions' => array( 'delete' ),
                   'script' => 'delete.php',
                   'single_post_actions' => array( 'DeleteCommentButton' => 'DeleteComment',
                                                   'CancelButton'=>'Cancel' ),
                   'params' => array( 'CommentID' ),
                   );
$ViewList['list'] = array(
                   'functions' => array( 'list' ),
                   'default_navigation_part' => 'ezcommentsnavigationpart',
                   'script' => 'list.php',
                   'unordered_params' => array( 'offset' => 'Offset' ),
                   );
$ViewList['view'] = array(
                   'functions' => array( 'read' ),
                   'script' => 'view.php',
                   'params' => array( 'ContentObjectID', 'Page' ),
                   );
*/

//the script used to setup the template plus the user permissions required for it (also see below). The default navigation part is optional but can be used to default what template will be loaded for the left navigation (this can also be defined within the view’s PHP file)

//setting user permissions required by our module:
$FunctionList = array();

?>