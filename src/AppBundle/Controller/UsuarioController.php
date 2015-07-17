<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Espacioalmacenamiento;
use AppBundle\Form\RegisUserType;

/**
 * Usuario controller.
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

    /**
     * Muestra formulario para registro usuarios
     *
     * @Route("/regisusuario", name="reg_usu")
     * @Method("GET")
     * @Template("AppBundle:Principal:regisuser.html.twig")
     */
    public function regUserAction()
    {
        $form = $this->createForm(new RegisUserType(), null, array(
            'action' => $this->generateUrl('do_regis_usu'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Crear'));

        return array(
            'form'   => $form->createView(),
        );
    }

    /**
     * Guarda el usuario
     *
     * @Route("/doregisusuario", name="do_regis_usu")
     * @Method("POST")
     */
    public function doRegUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $uri = $request->getUri();
        $form = $this->createForm(new RegisUserType(), null);
        $form->handlerequest($request);
        $data = $form->getData();
        $nombre = $data['nombre'];
        $password = $data['password'];
        $apellidos = $data['apellidos'];
        $correo = $data['correo'];

        $usuario = new Usuario();
        $usuario->setPassword($password);
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setCorreo($correo);
        $em->persist($usuario);
        $em->flush();

        $em1 = $this->getDoctrine()->getManager();
        $espacioAlmacenamiento = new Espacioalmacenamiento();
        $espacioAlmacenamiento->setUser($usuario);
        $em1->persist($espacioAlmacenamiento);
        $em1->flush();

        return $this->redirect($this->generateUrl('acceso_login'));
    }

}
