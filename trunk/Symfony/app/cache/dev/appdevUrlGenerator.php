<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_welcome' => true,
       '_demo_login' => true,
       '_security_check' => true,
       '_demo_logout' => true,
       'acme_demo_secured_hello' => true,
       '_demo_secured_hello' => true,
       '_demo_secured_hello_admin' => true,
       '_demo' => true,
       '_demo_hello' => true,
       '_demo_contact' => true,
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'employee' => true,
       'employee_show' => true,
       'employee_new' => true,
       'employee_create' => true,
       'employee_edit' => true,
       'employee_update' => true,
       'employee_delete' => true,
       'Forum' => true,
       'sujet' => true,
       'sujet_show' => true,
       'sujet_new' => true,
       'sujet_create' => true,
       'sujet_edit' => true,
       'sujet_update' => true,
       'sujet_delete' => true,
       'enseignement_forum' => true,
       'enseignement_addSujet' => true,
       'enseignement_createSujet' => true,
       'enseignement_addDocument' => true,
       'enseignement_create_document' => true,
       'enseignement_addDevoir' => true,
       'enseignement' => true,
       'enseignement_show' => true,
       'enseignement_new' => true,
       'enseignement_create' => true,
       'enseignement_edit' => true,
       'enseignement_update' => true,
       'enseignement_delete' => true,
       'critere' => true,
       'critere_show' => true,
       'critere_new' => true,
       'critere_create' => true,
       'critere_edit' => true,
       'critere_update' => true,
       'critere_delete' => true,
       'type' => true,
       'type_show' => true,
       'type_new' => true,
       'type_create' => true,
       'type_edit' => true,
       'type_update' => true,
       'type_delete' => true,
       'departement' => true,
       'departement_show' => true,
       'departement_new' => true,
       'departement_create' => true,
       'departement_edit' => true,
       'departement_update' => true,
       'departement_delete' => true,
       'formation' => true,
       'formation_show' => true,
       'formation_new' => true,
       'formation_create' => true,
       'formation_edit' => true,
       'formation_update' => true,
       'formation_delete' => true,
       'devoir' => true,
       'devoir_show' => true,
       'devoir_new' => true,
       'devoir_create' => true,
       'devoir_edit' => true,
       'devoir_update' => true,
       'devoir_delete' => true,
       'document' => true,
       'document_show' => true,
       'document_new' => true,
       'document_create' => true,
       'document_edit' => true,
       'document_update' => true,
       'document_delete' => true,
       'user' => true,
       'user_show' => true,
       'user_new' => true,
       'user_create' => true,
       'user_edit' => true,
       'user_update' => true,
       'user_delete' => true,
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

    private function get_welcomeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function get_demo_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login',  ),));
    }

    private function get_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login_check',  ),));
    }

    private function get_demo_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/logout',  ),));
    }

    private function getacme_demo_secured_helloRouteInfo()
    {
        return array(array (), array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_hello_adminRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello/admin',  ),));
    }

    private function get_demoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/',  ),));
    }

    private function get_demo_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/hello',  ),));
    }

    private function get_demo_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/contact',  ),));
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getemployeeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/employee/',  ),));
    }

    private function getemployee_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/employee',  ),));
    }

    private function getemployee_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/employee/new',  ),));
    }

    private function getemployee_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/employee/create',  ),));
    }

    private function getemployee_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/employee',  ),));
    }

    private function getemployee_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/employee',  ),));
    }

    private function getemployee_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/employee',  ),));
    }

    private function getForumRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/forum',  ),));
    }

    private function getsujetRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/sujet/',  ),));
    }

    private function getsujet_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/sujet',  ),));
    }

    private function getsujet_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/sujet/new',  ),));
    }

    private function getsujet_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/sujet/create',  ),));
    }

    private function getsujet_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/sujet',  ),));
    }

    private function getsujet_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/sujet',  ),));
    }

    private function getsujet_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/sujet',  ),));
    }

    private function getenseignement_forumRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::forumAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/forum',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_addSujetRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/nouveau_sujet',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_createSujetRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/create',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_addDocumentRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::create_documentAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add_document',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_create_documentRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::create_documentAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/create',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_addDevoirRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::create_devoirAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add_devoir',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignementRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/enseignement/',  ),));
    }

    private function getenseignement_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/enseignement/new',  ),));
    }

    private function getenseignement_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/enseignement/create',  ),));
    }

    private function getenseignement_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getenseignement_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/enseignement',  ),));
    }

    private function getcritereRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/critere/',  ),));
    }

    private function getcritere_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/critere',  ),));
    }

    private function getcritere_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/critere/new',  ),));
    }

    private function getcritere_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/critere/create',  ),));
    }

    private function getcritere_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/critere',  ),));
    }

    private function getcritere_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/critere',  ),));
    }

    private function getcritere_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/critere',  ),));
    }

    private function gettypeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/type/',  ),));
    }

    private function gettype_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/type',  ),));
    }

    private function gettype_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/type/new',  ),));
    }

    private function gettype_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/type/create',  ),));
    }

    private function gettype_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/type',  ),));
    }

    private function gettype_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/type',  ),));
    }

    private function gettype_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/type',  ),));
    }

    private function getdepartementRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/departement/',  ),));
    }

    private function getdepartement_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/departement',  ),));
    }

    private function getdepartement_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/departement/new',  ),));
    }

    private function getdepartement_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/departement/create',  ),));
    }

    private function getdepartement_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/departement',  ),));
    }

    private function getdepartement_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/departement',  ),));
    }

    private function getdepartement_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/departement',  ),));
    }

    private function getformationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/formation/',  ),));
    }

    private function getformation_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/formation',  ),));
    }

    private function getformation_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/formation/new',  ),));
    }

    private function getformation_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/formation/create',  ),));
    }

    private function getformation_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/formation',  ),));
    }

    private function getformation_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/formation',  ),));
    }

    private function getformation_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/formation',  ),));
    }

    private function getdevoirRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/devoir/',  ),));
    }

    private function getdevoir_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/devoir',  ),));
    }

    private function getdevoir_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/devoir/new',  ),));
    }

    private function getdevoir_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/devoir/create',  ),));
    }

    private function getdevoir_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/devoir',  ),));
    }

    private function getdevoir_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/devoir',  ),));
    }

    private function getdevoir_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/devoir',  ),));
    }

    private function getdocumentRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/document/',  ),));
    }

    private function getdocument_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/document',  ),));
    }

    private function getdocument_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/document/new',  ),));
    }

    private function getdocument_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/document/create',  ),));
    }

    private function getdocument_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/document',  ),));
    }

    private function getdocument_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/document',  ),));
    }

    private function getdocument_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/document',  ),));
    }

    private function getuserRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/',  ),));
    }

    private function getuser_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/new',  ),));
    }

    private function getuser_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/user/create',  ),));
    }

    private function getuser_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }
}
