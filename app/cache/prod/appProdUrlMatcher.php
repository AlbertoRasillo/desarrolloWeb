<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

                // archivo_new
                if ($pathinfo === '/archivo/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_archivo_new;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ArchivoController::newAction',  '_route' => 'archivo_new',);
                }
                not_archivo_new:

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

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
