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

                if (0 === strpos($pathinfo, '/archivo/upload')) {
                    // upload_file
                    if (preg_match('#^/archivo/upload/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_upload_file;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_file')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::uploadAction',));
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

                // archivo_eliminar
                if (0 === strpos($pathinfo, '/archivo/eliminar') && preg_match('#^/archivo/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo_eliminar;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivo_eliminar')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::eliminarArchivoAction',));
                }
                not_archivo_eliminar:

                // archivo_descarga
                if (0 === strpos($pathinfo, '/archivo/descarga') && preg_match('#^/archivo/descarga/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo_descarga;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivo_descarga')), array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::downloadAction',));
                }
                not_archivo_descarga:

            }

            // homepage
            if ($pathinfo === '/app/example') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            }

        }

        if (0 === strpos($pathinfo, '/directorio')) {
            // subir_dir
            if ($pathinfo === '/directorio/subirdir') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_subir_dir;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::uploadDirecAction',  '_route' => 'subir_dir',);
            }
            not_subir_dir:

            // actualiza_dir
            if (0 === strpos($pathinfo, '/directorio/actualizadir') && preg_match('#^/directorio/actualizadir(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_actualiza_dir;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'actualiza_dir')), array (  'id' => '',  '_controller' => 'AppBundle\\Controller\\DirectorioController::updateDirecAction',));
            }
            not_actualiza_dir:

            if (0 === strpos($pathinfo, '/directorio/do')) {
                // do_subir_dir
                if ($pathinfo === '/directorio/dosubirdir') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_do_subir_dir;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::doSubirDirAction',  '_route' => 'do_subir_dir',);
                }
                not_do_subir_dir:

                // do_actuali_dir
                if ($pathinfo === '/directorio/doactualizadir') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_do_actuali_dir;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::doActualizaDirAction',  '_route' => 'do_actuali_dir',);
                }
                not_do_actuali_dir:

            }

            // directorio_eliminar
            if (0 === strpos($pathinfo, '/directorio/eliminar') && preg_match('#^/directorio/eliminar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_directorio_eliminar;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'directorio_eliminar')), array (  '_controller' => 'AppBundle\\Controller\\DirectorioController::eliminarDirectorioAction',));
            }
            not_directorio_eliminar:

        }

        // do_regis_espacio
        if ($pathinfo === '/espacioalmacenamiento/doregisusuario') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_do_regis_espacio;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\EspacioalmacenamientoController::doRegUserAction',  '_route' => 'do_regis_espacio',);
        }
        not_do_regis_espacio:

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

            // reg_usu
            if ($pathinfo === '/usuario/regisusuario') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reg_usu;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\UsuarioController::regUserAction',  '_route' => 'reg_usu',);
            }
            not_reg_usu:

            // do_regis_usu
            if ($pathinfo === '/usuario/doregisusuario') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_do_regis_usu;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\UsuarioController::doRegUserAction',  '_route' => 'do_regis_usu',);
            }
            not_do_regis_usu:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
