<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
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
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/archivo')) {
                // archivo
                if (rtrim($pathinfo, '/') === '/archivo') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'archivo');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::indexAction',  '_route' => 'archivo',);
                }
                not_archivo:

                // archivo_create
                if ($pathinfo === '/archivo/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_archivo_create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::createAction',  '_route' => 'archivo_create',);
                }
                not_archivo_create:

                if (0 === strpos($pathinfo, '/archivo/upload')) {
                    // upload_file
                    if ($pathinfo === '/archivo/upload') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_upload_file;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::uploadAction',  '_route' => 'upload_file',);
                    }
                    not_upload_file:

                    // do_upload_file
                    if ($pathinfo === '/archivo/upload') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_do_upload_file;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::doUploadAction',  '_route' => 'do_upload_file',);
                    }
                    not_do_upload_file:

                }

                // archivo_new
                if ($pathinfo === '/archivo/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo_new;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::newAction',  '_route' => 'archivo_new',);
                }
                not_archivo_new:

                // archivo_eliminar
                if (0 === strpos($pathinfo, '/archivo/eliminar') && preg_match('#^/archivo/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo_eliminar;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivo_eliminar')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::eliminarArchivoAction',));
                }
                not_archivo_eliminar:

                // archivo_show
                if (preg_match('#^/archivo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivo_show')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::showAction',));
                }
                not_archivo_show:

                // archivo_edit
                if (preg_match('#^/archivo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivo_edit')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::editAction',));
                }
                not_archivo_edit:

                // archivo_update
                if (preg_match('#^/archivo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_archivo_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivo_update')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::updateAction',));
                }
                not_archivo_update:

                // archivo_delete
                if (preg_match('#^/archivo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_archivo_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivo_delete')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::deleteAction',));
                }
                not_archivo_delete:

            }

            // homepage
            if ($pathinfo === '/app/example') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            }

        }

        if (0 === strpos($pathinfo, '/directorio')) {
            // directorio
            if (rtrim($pathinfo, '/') === '/directorio') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_directorio;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'directorio');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::indexAction',  '_route' => 'directorio',);
            }
            not_directorio:

            // directorio_create
            if ($pathinfo === '/directorio/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_directorio_create;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::createAction',  '_route' => 'directorio_create',);
            }
            not_directorio_create:

            // directorio_new
            if ($pathinfo === '/directorio/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_directorio_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::newAction',  '_route' => 'directorio_new',);
            }
            not_directorio_new:

            // directorio_show
            if (preg_match('#^/directorio/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_directorio_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'directorio_show')), array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::showAction',));
            }
            not_directorio_show:

            // directorio_edit
            if (preg_match('#^/directorio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_directorio_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'directorio_edit')), array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::editAction',));
            }
            not_directorio_edit:

            // directorio_update
            if (preg_match('#^/directorio/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_directorio_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'directorio_update')), array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::updateAction',));
            }
            not_directorio_update:

            // directorio_delete
            if (preg_match('#^/directorio/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_directorio_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'directorio_delete')), array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::deleteAction',));
            }
            not_directorio_delete:

            // directorio_eliminar
            if (0 === strpos($pathinfo, '/directorio/eliminar') && preg_match('#^/directorio/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_directorio_eliminar;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'directorio_eliminar')), array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::eliminarDirectorioAction',));
            }
            not_directorio_eliminar:

            // subir_dir
            if ($pathinfo === '/directorio/subirdir') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_subir_dir;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::uploadDirecAction',  '_route' => 'subir_dir',);
            }
            not_subir_dir:

            // do_dubir_dir
            if ($pathinfo === '/directorio/dosubirdir') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_do_dubir_dir;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::doSubirDirAction',  '_route' => 'do_dubir_dir',);
            }
            not_do_dubir_dir:

        }

        if (0 === strpos($pathinfo, '/espacioalmacenamiento')) {
            // espacioalmacenamiento
            if (rtrim($pathinfo, '/') === '/espacioalmacenamiento') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_espacioalmacenamiento;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'espacioalmacenamiento');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::indexAction',  '_route' => 'espacioalmacenamiento',);
            }
            not_espacioalmacenamiento:

            // espacioalmacenamiento_create
            if ($pathinfo === '/espacioalmacenamiento/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_espacioalmacenamiento_create;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::createAction',  '_route' => 'espacioalmacenamiento_create',);
            }
            not_espacioalmacenamiento_create:

            // espacioalmacenamiento_new
            if ($pathinfo === '/espacioalmacenamiento/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_espacioalmacenamiento_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::newAction',  '_route' => 'espacioalmacenamiento_new',);
            }
            not_espacioalmacenamiento_new:

            // espacioalmacenamiento_show
            if (preg_match('#^/espacioalmacenamiento/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_espacioalmacenamiento_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'espacioalmacenamiento_show')), array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::showAction',));
            }
            not_espacioalmacenamiento_show:

            // espacioalmacenamiento_edit
            if (preg_match('#^/espacioalmacenamiento/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_espacioalmacenamiento_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'espacioalmacenamiento_edit')), array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::editAction',));
            }
            not_espacioalmacenamiento_edit:

            // espacioalmacenamiento_update
            if (preg_match('#^/espacioalmacenamiento/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_espacioalmacenamiento_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'espacioalmacenamiento_update')), array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::updateAction',));
            }
            not_espacioalmacenamiento_update:

            // espacioalmacenamiento_delete
            if (preg_match('#^/espacioalmacenamiento/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_espacioalmacenamiento_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'espacioalmacenamiento_delete')), array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::deleteAction',));
            }
            not_espacioalmacenamiento_delete:

        }

        if (0 === strpos($pathinfo, '/principal')) {
            // principal
            if (preg_match('#^/principal(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_principal;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'principal')), array (  'id' => '',  '_controller' => 'AppBundle\\Controller\\PrincipalController::indexAction',));
            }
            not_principal:

            // app_principal_index
            if (rtrim($pathinfo, '/') === '/principal') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_app_principal_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'app_principal_index');
                }

                return array (  'id' => '',  '_controller' => 'AppBundle\\Controller\\PrincipalController::indexAction',  '_route' => 'app_principal_index',);
            }
            not_app_principal_index:

        }

        if (0 === strpos($pathinfo, '/usuario')) {
            if (0 === strpos($pathinfo, '/usuario/login')) {
                // acceso_login
                if ($pathinfo === '/usuario/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_acceso_login;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\UsuarioController::loginAction',  '_route' => 'acceso_login',);
                }
                not_acceso_login:

                // dologin
                if ($pathinfo === '/usuario/login') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_dologin;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\UsuarioController::dologinAction',  '_route' => 'dologin',);
                }
                not_dologin:

            }

            // salir
            if ($pathinfo === '/usuario/salir') {
                return array (  '_controller' => 'AppBundle\\Controller\\UsuarioController::deleteSession',  '_route' => 'salir',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
