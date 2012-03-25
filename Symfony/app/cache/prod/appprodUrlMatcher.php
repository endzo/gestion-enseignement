<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        if (0 === strpos($pathinfo, '/subject')) {
            // subject
            if (rtrim($pathinfo, '/') === '/subject') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'subject');
                }
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::indexAction',  '_route' => 'subject',);
            }

            // subject_show
            if (preg_match('#^/subject/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::showAction',)), array('_route' => 'subject_show'));
            }

            // subject_new
            if ($pathinfo === '/subject/new') {
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::newAction',  '_route' => 'subject_new',);
            }

            // subject_create
            if ($pathinfo === '/subject/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_subject_create;
                }
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::createAction',  '_route' => 'subject_create',);
            }
            not_subject_create:

            // subject_edit
            if (preg_match('#^/subject/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::editAction',)), array('_route' => 'subject_edit'));
            }

            // subject_update
            if (preg_match('#^/subject/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_subject_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::updateAction',)), array('_route' => 'subject_update'));
            }
            not_subject_update:

            // subject_delete
            if (preg_match('#^/subject/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_subject_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::deleteAction',)), array('_route' => 'subject_delete'));
            }
            not_subject_delete:

        }

        if (0 === strpos($pathinfo, '/comment')) {
            // comment
            if (rtrim($pathinfo, '/') === '/comment') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'comment');
                }
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::indexAction',  '_route' => 'comment',);
            }

            // comment_show
            if (preg_match('#^/comment/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::showAction',)), array('_route' => 'comment_show'));
            }

            // comment_new
            if ($pathinfo === '/comment/new') {
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::newAction',  '_route' => 'comment_new',);
            }

            // comment_create
            if ($pathinfo === '/comment/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_comment_create;
                }
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::createAction',  '_route' => 'comment_create',);
            }
            not_comment_create:

            // comment_edit
            if (preg_match('#^/comment/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::editAction',)), array('_route' => 'comment_edit'));
            }

            // comment_update
            if (preg_match('#^/comment/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_comment_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::updateAction',)), array('_route' => 'comment_update'));
            }
            not_comment_update:

            // comment_delete
            if (preg_match('#^/comment/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_comment_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\CommentController::deleteAction',)), array('_route' => 'comment_delete'));
            }
            not_comment_delete:

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::showAction',)), array('_route' => 'user_show'));
            }

            // user_new
            if ($pathinfo === '/user/new') {
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

            // user_create
            if ($pathinfo === '/user/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }
                return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::editAction',)), array('_route' => 'user_edit'));
            }

            // user_update
            if (preg_match('#^/user/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::updateAction',)), array('_route' => 'user_update'));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Amine\\ForumBundle\\Controller\\UserController::deleteAction',)), array('_route' => 'user_delete'));
            }
            not_user_delete:

        }

        // Accueil
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'Accueil');
            }
            return array (  '_controller' => 'Amine\\ForumBundle\\Controller\\SubjectController::indexAction',  '_route' => 'Accueil',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
