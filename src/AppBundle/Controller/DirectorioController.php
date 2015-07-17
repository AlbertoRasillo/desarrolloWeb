<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Directorio;
use AppBundle\Form\DirectorioType;
use AppBundle\Form\SubirDirecType;

/**
 * Directorio controller.
 *
 * @Route("/directorio")
 */
class DirectorioController extends Controller
{

    /**
     * Muestra formulario para subir un directorio.
     *
     * @Route("/subirdir", name="subir_dir")
     * @Method("GET")
     * @Template("AppBundle:Directorio:upload.html.twig")
     */
    public function uploadDirecAction()
    {
        $form = $this->createForm(new SubirDirecType(), null, array(
            'action' => $this->generateUrl('do_subir_dir'),
            'method' => 'GET',
        ));
        $form->add('submit', 'submit', array('label' => 'Crear'));

        return array(
            'form'   => $form->createView(),
        );
    }
    /**
     * Guarda el directorio
     *
     * @Route("/dosubirdir", name="do_subir_dir")
     * @Method("GET")
     */
    public function doSubirDirAction(Request $request)
    {
        $session = $this->get('Session');
        $us=$session->get('usuario');

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new SubirDirecType(), null);
        $form->handlerequest($request);
        $data = $form->getData();
        $nombre = $data['nombre'];
        echo $nombre;exit;
        $DQL = "select e from AppBundle:Espacioalmacenamiento e join e.user u where u.id = '" .$us->getId() . "'";
        $idEspacio = $em->createQuery($DQL)->getSingleResult();

        $directorio = new Directorio();
        $directorio->setNombre($nombre);

        $directorio->setEspacioalmacenamiento($idEspacio);
        $em->persist($directorio);
        $em->flush();

        return $this->redirect($this->generateUrl('principal'));
    }

        /**
     * Encuentra por id a un directorio y lo elimina
     *
     * @Route("/eliminar/{id}", name="directorio_eliminar")
     * @Method("GET")
     * @Template()
     */
    public function eliminarDirectorioAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Directorio')->find($id);

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('principal'));

    }


}
