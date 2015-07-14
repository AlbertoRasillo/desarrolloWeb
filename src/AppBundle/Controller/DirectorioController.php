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
     * Lists all Directorio entities.
     *
     * @Route("/", name="directorio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Directorio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Directorio entity.
     *
     * @Route("/", name="directorio_create")
     * @Method("POST")
     * @Template("AppBundle:Directorio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Directorio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('directorio_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('principal'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Directorio entity.
     *
     * @param Directorio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Directorio $entity)
    {
        $form = $this->createForm(new DirectorioType(), $entity, array(
            'action' => $this->generateUrl('directorio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Directorio entity.
     *
     * @Route("/new", name="directorio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Directorio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Directorio entity.
     *
     * @Route("/{id}", name="directorio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Directorio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Directorio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Directorio entity.
     *
     * @Route("/{id}/edit", name="directorio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Directorio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Directorio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Directorio entity.
    *
    * @param Directorio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Directorio $entity)
    {
        $form = $this->createForm(new DirectorioType(), $entity, array(
            'action' => $this->generateUrl('directorio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Directorio entity.
     *
     * @Route("/{id}", name="directorio_update")
     * @Method("PUT")
     * @Template("AppBundle:Directorio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Directorio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Directorio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('directorio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Directorio entity.
     *
     * @Route("/{id}", name="directorio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Directorio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Directorio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('directorio'));
    }

    /**
     * Creates a form to delete a Directorio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('directorio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
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
        $form->add('submit', 'submit', array('label' => 'Subir'));

        return array(
            'form'   => $form->createView(),
        );
    }
    /**
     * Guarda el directorio
     *
     * @Route("/dosubirdir", name="do_dubir_dir")
     * @Method("POST")
     */
    public function doSubirDirAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $uri = $request->getUri();
        $form = $this->createForm(new SubirDirecType(), null);
        $form->handlerequest($request);
        $data = $form->getData();
        $nombre = $data['nombre'];

        $directorio = new Directorio();
        $directorio->setNombre($nombre);

        $em->persist($directorio);
        $em->flush();

        return $this->redirect($this->generateUrl('principal'));
    }
}
