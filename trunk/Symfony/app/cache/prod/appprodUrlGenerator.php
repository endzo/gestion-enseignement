<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appprodUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       'subject' => true,
       'subject_show' => true,
       'subject_new' => true,
       'subject_create' => true,
       'subject_edit' => true,
       'subject_update' => true,
       'subject_delete' => true,
       'comment' => true,
       'comment_show' => true,
       'comment_new' => true,
       'comment_create' => true,
       'comment_edit' => true,
       'comment_update' => true,
       'comment_delete' => true,
       'user' => true,
       'user_show' => true,
       'user_new' => true,
       'user_create' => true,
       'user_edit' => true,
       'user_update' => true,
       'user_delete' => true,
       'Accueil' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function getsubjectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/subject/',  ),));
    }

    private function getsubject_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/subject',  ),));
    }

    private function getsubject_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/subject/new',  ),));
    }

    private function getsubject_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/subject/create',  ),));
    }

    private function getsubject_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/subject',  ),));
    }

    private function getsubject_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/subject',  ),));
    }

    private function getsubject_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/subject',  ),));
    }

    private function getcommentRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/comment/',  ),));
    }

    private function getcomment_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/comment',  ),));
    }

    private function getcomment_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/comment/new',  ),));
    }

    private function getcomment_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/comment/create',  ),));
    }

    private function getcomment_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/comment',  ),));
    }

    private function getcomment_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/comment',  ),));
    }

    private function getcomment_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/comment',  ),));
    }

    private function getuserRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/',  ),));
    }

    private function getuser_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/new',  ),));
    }

    private function getuser_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/user/create',  ),));
    }

    private function getuser_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getAccueilRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }
}
