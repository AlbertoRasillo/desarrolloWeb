<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Espacioalmacenamiento;
use AppBundle\Form\EspacioalmacenamientoType;

/**
 * Espacioalmacenamiento controller.
 *
 * @Route("/espacioalmacenamiento")
 */
class EspacioalmacenamientoController extends Controller
{

    
    /**
     * Guarda el usuario
     *
     * @Route("/doregisusuario", name="do_regis_espacio")
     * @Method("GET")
     * @Template()
     */
    public function doRegUserAction(Request $request)
    {

        $em1 = $this->getDoctrine()->getManager();
        $espacioAlmacenamiento = new Espacioalmacenamiento();
        $espacioAlmacenamiento->setIdlogin();
        $em1->persist($espacioAlmacenamiento);
        $em1->flush();

        return $this->redirect($this->generateUrl('acceso_login'));
    }

}
