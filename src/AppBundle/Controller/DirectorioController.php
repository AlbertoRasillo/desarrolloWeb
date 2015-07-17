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
use AppBundle\Form\ActualiDirecType;

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
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Crear'));
        $session = $this->get('Session');
        $directoactual=$session->get('iddirecactual');
        if($directoactual!=null){
            $form->get('id')->setData($directoactual);
        }

        return array(
            'form'   => $form->createView(),
        );
    }


    /**
     * Muestra formulario para actualizar un directorio.
     *
     * @Route("/actualizadir/{id}",defaults={"id" = ""}, name="actualiza_dir")
     * @Method("GET")
     * @Template("AppBundle:Directorio:upload.html.twig")
     */
    public function updateDirecAction($id)
    {
        $session = $this->get('Session');
        $session->set('idantigua',$id);
        $form = $this->createForm(new ActualiDirecType(), null, array(
            'action' => $this->generateUrl('do_actuali_dir'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Crear'));
        $idactual=$session->get('idantigua');
        $form->get('idantigua')->setData($idactual);
        $directoactual=$session->get('iddirecactual');
        if($directoactual!=null){
            $form->get('id')->setData($directoactual);
        }

        return array(
            'form'   => $form->createView(),
        );
    }

    /**
     * Guarda el directorio
     *
     * @Route("/dosubirdir", name="do_subir_dir")
     * @Method("POST")
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
        $idPar = $data['id'];
        $DQL = "select e from AppBundle:Espacioalmacenamiento e join e.user u where u.id = '" .$us->getId() . "'";
        $idEspacio = $em->createQuery($DQL)->getSingleResult();
        if($idPar!=null){
            $idParent = $em->getReference('AppBundle\Entity\Directorio', $idPar);
        }

        $directorio = new Directorio();

        $directorio->setNombre($nombre);
        $directorio->setEspacioalmacenamiento($idEspacio);
        if($idPar!=null){
            $directorio->setParent($idParent);
        }
        else{ $pathdefecto= "/";
            $directorio->setPath($pathdefecto);}
        $em->persist($directorio);
        $em->flush();

        return $this->redirect($this->generateUrl('principal'));
    }


    /**
     * Guarda el directorio
     *
     * @Route("/doactualizadir", name="do_actuali_dir")
     * @Method("POST")
     */
    public function doActualizaDirAction(Request $request)
    {
        $session = $this->get('Session');
        $us=$session->get('usuario');

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ActualiDirecType(), null);
        $form->handlerequest($request);
        $data = $form->getData();
       
        $nombre = $data['nombre'];
        $idPar = $data['id'];
        $idAntigua = $data['idantigua'];
        $DQL = "select e from AppBundle:Espacioalmacenamiento e join e.user u where u.id = '" .$us->getId() . "'";
        $idEspacio = $em->createQuery($DQL)->getSingleResult();
        if($idPar!=null){
            $idParent = $em->getReference('AppBundle\Entity\Directorio', $idPar);
        }

        $directorio = new Directorio();

        $directorio->setNombre($nombre);
        $directorio->setId($idAntigua);
        $directorio->setEspacioalmacenamiento($idEspacio);
        if($idPar!=null){
            $directorio->setParent($idParent);
        }
        else{ $pathdefecto= "/";
            $directorio->setPath($pathdefecto);}
        $em->merge($directorio);
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
