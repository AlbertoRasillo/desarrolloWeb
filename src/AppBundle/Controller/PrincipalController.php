<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Archivo;
use AppBundle\Form\ArchivoType;

/**
 * Principal controller.
 *
 * @Route("/principal")
 */
class UsuarioController extends Controller
{
    /**
     * Autentificacion de usuario.
     *
     * @Route("/principal", name="principal")
     * @Method("GET")
     * @Template("AppBundle:Principal:principal.html.twig")
     */

    public function indexAction()
    {
    
    $session = $this->get('Session');
    $us=$session->get('usuario');
    if($us){
            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository('AppBundle:Archivo')->findAll();

            return array(
                'entities' => $entities,
            );
    }
    else
        return $this->redirect($this->generateUrl('acceso_login'));
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
    		return $this->redirect($this->generateUrl('archivo'));
    	}
    	else
    		return $this->redirect($this->generateUrl('acceso_login'));
        }



}
