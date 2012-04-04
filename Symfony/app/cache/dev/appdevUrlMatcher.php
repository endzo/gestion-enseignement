<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }
            return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::indexAction',  '_route' => '_welcome',);
        }

        // _demo_login
        if ($pathinfo === '/demo/secured/login') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
        }

        // _security_check
        if ($pathinfo === '/demo/secured/login_check') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
        }

        // _demo_logout
        if ($pathinfo === '/demo/secured/logout') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
        }

        // acme_demo_secured_hello
        if ($pathinfo === '/demo/secured/hello') {
            return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
        }

        // _demo_secured_hello
        if (0 === strpos($pathinfo, '/demo/secured/hello') && preg_match('#^/demo/secured/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
        }

        // _demo_secured_hello_admin
        if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
        }

        if (0 === strpos($pathinfo, '/demo')) {
            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',)), array('_route' => '_demo_hello'));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        if (0 === strpos($pathinfo, '/employee')) {
            // employee
            if (rtrim($pathinfo, '/') === '/employee') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'employee');
                }
                return array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::indexAction',  '_route' => 'employee',);
            }

            // employee_show
            if (preg_match('#^/employee/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::showAction',)), array('_route' => 'employee_show'));
            }

            // employee_new
            if ($pathinfo === '/employee/new') {
                return array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::newAction',  '_route' => 'employee_new',);
            }

            // employee_create
            if ($pathinfo === '/employee/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_employee_create;
                }
                return array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::createAction',  '_route' => 'employee_create',);
            }
            not_employee_create:

            // employee_edit
            if (preg_match('#^/employee/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::editAction',)), array('_route' => 'employee_edit'));
            }

            // employee_update
            if (preg_match('#^/employee/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_employee_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::updateAction',)), array('_route' => 'employee_update'));
            }
            not_employee_update:

            // employee_delete
            if (preg_match('#^/employee/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_employee_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\TestBundle\\Controller\\EmployeeController::deleteAction',)), array('_route' => 'employee_delete'));
            }
            not_employee_delete:

        }

        // Forum
        if ($pathinfo === '/forum') {
            return array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::indexAction',  '_route' => 'Forum',);
        }

        if (0 === strpos($pathinfo, '/sujet')) {
            // sujet
            if (rtrim($pathinfo, '/') === '/sujet') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sujet');
                }
                return array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::indexAction',  '_route' => 'sujet',);
            }

            // sujet_show
            if (preg_match('#^/sujet/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::showAction',)), array('_route' => 'sujet_show'));
            }

            // sujet_new
            if ($pathinfo === '/sujet/new') {
                return array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::newAction',  '_route' => 'sujet_new',);
            }

            // sujet_create
            if ($pathinfo === '/sujet/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sujet_create;
                }
                return array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::createAction',  '_route' => 'sujet_create',);
            }
            not_sujet_create:

            // sujet_edit
            if (preg_match('#^/sujet/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::editAction',)), array('_route' => 'sujet_edit'));
            }

            // sujet_update
            if (preg_match('#^/sujet/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sujet_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::updateAction',)), array('_route' => 'sujet_update'));
            }
            not_sujet_update:

            // sujet_delete
            if (preg_match('#^/sujet/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sujet_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::deleteAction',)), array('_route' => 'sujet_delete'));
            }
            not_sujet_delete:

        }

        if (0 === strpos($pathinfo, '/enseignement')) {
            // enseignement_forum
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/forum$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::forumAction',)), array('_route' => 'enseignement_forum'));
            }

            // enseignement_addSujet
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/nouveau_sujet$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::newAction',)), array('_route' => 'enseignement_addSujet'));
            }

            // enseignement_createSujet
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/create$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_enseignement_createSujet;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\ForumBundle\\Controller\\SujetController::createAction',)), array('_route' => 'enseignement_createSujet'));
            }
            not_enseignement_createSujet:

            // enseignement_addDocument
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/add_document$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::create_documentAction',)), array('_route' => 'enseignement_addDocument'));
            }

            // enseignement_create_document
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/create$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_enseignement_create_document;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::create_documentAction',)), array('_route' => 'enseignement_create_document'));
            }
            not_enseignement_create_document:

            // enseignement_addDevoir
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/add_devoir$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::create_devoirAction',)), array('_route' => 'enseignement_addDevoir'));
            }

            // enseignement
            if (rtrim($pathinfo, '/') === '/enseignement') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'enseignement');
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::indexAction',  '_route' => 'enseignement',);
            }

            // enseignement_show
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::showAction',)), array('_route' => 'enseignement_show'));
            }

            // enseignement_new
            if ($pathinfo === '/enseignement/new') {
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::newAction',  '_route' => 'enseignement_new',);
            }

            // enseignement_create
            if ($pathinfo === '/enseignement/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_enseignement_create;
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::createAction',  '_route' => 'enseignement_create',);
            }
            not_enseignement_create:

            // enseignement_edit
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::editAction',)), array('_route' => 'enseignement_edit'));
            }

            // enseignement_update
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_enseignement_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::updateAction',)), array('_route' => 'enseignement_update'));
            }
            not_enseignement_update:

            // enseignement_delete
            if (preg_match('#^/enseignement/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_enseignement_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\EnseignementController::deleteAction',)), array('_route' => 'enseignement_delete'));
            }
            not_enseignement_delete:

        }

        if (0 === strpos($pathinfo, '/critere')) {
            // critere
            if (rtrim($pathinfo, '/') === '/critere') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'critere');
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::indexAction',  '_route' => 'critere',);
            }

            // critere_show
            if (preg_match('#^/critere/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::showAction',)), array('_route' => 'critere_show'));
            }

            // critere_new
            if ($pathinfo === '/critere/new') {
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::newAction',  '_route' => 'critere_new',);
            }

            // critere_create
            if ($pathinfo === '/critere/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_critere_create;
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::createAction',  '_route' => 'critere_create',);
            }
            not_critere_create:

            // critere_edit
            if (preg_match('#^/critere/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::editAction',)), array('_route' => 'critere_edit'));
            }

            // critere_update
            if (preg_match('#^/critere/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_critere_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::updateAction',)), array('_route' => 'critere_update'));
            }
            not_critere_update:

            // critere_delete
            if (preg_match('#^/critere/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_critere_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\CritereController::deleteAction',)), array('_route' => 'critere_delete'));
            }
            not_critere_delete:

        }

        if (0 === strpos($pathinfo, '/type')) {
            // type
            if (rtrim($pathinfo, '/') === '/type') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'type');
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::indexAction',  '_route' => 'type',);
            }

            // type_show
            if (preg_match('#^/type/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::showAction',)), array('_route' => 'type_show'));
            }

            // type_new
            if ($pathinfo === '/type/new') {
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::newAction',  '_route' => 'type_new',);
            }

            // type_create
            if ($pathinfo === '/type/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_type_create;
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::createAction',  '_route' => 'type_create',);
            }
            not_type_create:

            // type_edit
            if (preg_match('#^/type/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::editAction',)), array('_route' => 'type_edit'));
            }

            // type_update
            if (preg_match('#^/type/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_type_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::updateAction',)), array('_route' => 'type_update'));
            }
            not_type_update:

            // type_delete
            if (preg_match('#^/type/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_type_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\TypeController::deleteAction',)), array('_route' => 'type_delete'));
            }
            not_type_delete:

        }

        if (0 === strpos($pathinfo, '/departement')) {
            // departement
            if (rtrim($pathinfo, '/') === '/departement') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'departement');
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::indexAction',  '_route' => 'departement',);
            }

            // departement_show
            if (preg_match('#^/departement/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::showAction',)), array('_route' => 'departement_show'));
            }

            // departement_new
            if ($pathinfo === '/departement/new') {
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::newAction',  '_route' => 'departement_new',);
            }

            // departement_create
            if ($pathinfo === '/departement/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_departement_create;
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::createAction',  '_route' => 'departement_create',);
            }
            not_departement_create:

            // departement_edit
            if (preg_match('#^/departement/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::editAction',)), array('_route' => 'departement_edit'));
            }

            // departement_update
            if (preg_match('#^/departement/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_departement_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::updateAction',)), array('_route' => 'departement_update'));
            }
            not_departement_update:

            // departement_delete
            if (preg_match('#^/departement/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_departement_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DepartementController::deleteAction',)), array('_route' => 'departement_delete'));
            }
            not_departement_delete:

        }

        if (0 === strpos($pathinfo, '/formation')) {
            // formation
            if (rtrim($pathinfo, '/') === '/formation') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'formation');
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::indexAction',  '_route' => 'formation',);
            }

            // formation_show
            if (preg_match('#^/formation/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::showAction',)), array('_route' => 'formation_show'));
            }

            // formation_new
            if ($pathinfo === '/formation/new') {
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::newAction',  '_route' => 'formation_new',);
            }

            // formation_create
            if ($pathinfo === '/formation/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_formation_create;
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::createAction',  '_route' => 'formation_create',);
            }
            not_formation_create:

            // formation_edit
            if (preg_match('#^/formation/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::editAction',)), array('_route' => 'formation_edit'));
            }

            // formation_update
            if (preg_match('#^/formation/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_formation_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::updateAction',)), array('_route' => 'formation_update'));
            }
            not_formation_update:

            // formation_delete
            if (preg_match('#^/formation/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_formation_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\FormationController::deleteAction',)), array('_route' => 'formation_delete'));
            }
            not_formation_delete:

        }

        if (0 === strpos($pathinfo, '/devoir')) {
            // devoir
            if (rtrim($pathinfo, '/') === '/devoir') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'devoir');
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::indexAction',  '_route' => 'devoir',);
            }

            // devoir_show
            if (preg_match('#^/devoir/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::showAction',)), array('_route' => 'devoir_show'));
            }

            // devoir_new
            if ($pathinfo === '/devoir/new') {
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::newAction',  '_route' => 'devoir_new',);
            }

            // devoir_create
            if ($pathinfo === '/devoir/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_devoir_create;
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::createAction',  '_route' => 'devoir_create',);
            }
            not_devoir_create:

            // devoir_edit
            if (preg_match('#^/devoir/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::editAction',)), array('_route' => 'devoir_edit'));
            }

            // devoir_update
            if (preg_match('#^/devoir/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_devoir_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::updateAction',)), array('_route' => 'devoir_update'));
            }
            not_devoir_update:

            // devoir_delete
            if (preg_match('#^/devoir/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_devoir_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DevoirController::deleteAction',)), array('_route' => 'devoir_delete'));
            }
            not_devoir_delete:

        }

        if (0 === strpos($pathinfo, '/document')) {
            // document
            if (rtrim($pathinfo, '/') === '/document') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'document');
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::indexAction',  '_route' => 'document',);
            }

            // document_show
            if (preg_match('#^/document/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::showAction',)), array('_route' => 'document_show'));
            }

            // document_new
            if ($pathinfo === '/document/new') {
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::newAction',  '_route' => 'document_new',);
            }

            // document_create
            if ($pathinfo === '/document/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_document_create;
                }
                return array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::createAction',  '_route' => 'document_create',);
            }
            not_document_create:

            // document_edit
            if (preg_match('#^/document/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::editAction',)), array('_route' => 'document_edit'));
            }

            // document_update
            if (preg_match('#^/document/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_document_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::updateAction',)), array('_route' => 'document_update'));
            }
            not_document_update:

            // document_delete
            if (preg_match('#^/document/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_document_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\CoursBundle\\Controller\\DocumentController::deleteAction',)), array('_route' => 'document_delete'));
            }
            not_document_delete:

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }
                return array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::showAction',)), array('_route' => 'user_show'));
            }

            // user_new
            if ($pathinfo === '/user/new') {
                return array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

            // user_create
            if ($pathinfo === '/user/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }
                return array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::editAction',)), array('_route' => 'user_edit'));
            }

            // user_update
            if (preg_match('#^/user/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::updateAction',)), array('_route' => 'user_update'));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Projet\\UserBundle\\Controller\\UserController::deleteAction',)), array('_route' => 'user_delete'));
            }
            not_user_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
