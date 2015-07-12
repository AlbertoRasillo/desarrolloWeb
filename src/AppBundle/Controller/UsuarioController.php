<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Usuario;
use AppBundle\Form\ArchivoType;

/**
 * Archivo controller.
 *
 * @Route("/usuario")
 */
class UsuarioController extends Controller
{
    /**
     * Autentificacion de usuario.
     *
     * @Route("/login", name="acceso_login")
     * @Method("GET")
     * @Template("AppBundle:Principal:login.html.twig")
     */
    public function loginAction()
    {
        $em = $this->getDoctrine()->getManager();

        return array(
        );
    }

    /**
     * Autentificacion de usuario.
     *
     * @Route("/login", name="dologin")
     * @Method("POST")
     */
    public function dologinAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
    	$nombre = $request->request->get("nombre");	// or GET seria $request->query->get()
    	$password = $request->request->get("password");

    	$user = $em->getRepository('AppBundle:Usuario')->findOneBy(array('nombre'=>$nombre, 'password'=>$password));
    	if( $user ) {
    		$session = $this->get('Session');
    		$session->set('usuario',$user);
    		return $this->redirect($this->generateUrl('principal'));
    	}
    	else
    		return $this->redirect($this->generateUrl('acceso_login'));
    }

    /**
     * Eliminar sesion de usuario.
     *
     * @Route("/salir", name="salir")
     * 
     */
    public function deleteSession()
    {
        $session = $this->get('Session');
        $session->invalidate();
        return $this->redirect($this->generateUrl('acceso_login'));
    }


}
