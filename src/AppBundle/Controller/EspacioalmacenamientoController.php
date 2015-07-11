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
     * Lists all Espacioalmacenamiento entities.
     *
     * @Route("/", name="espacioalmacenamiento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Espacioalmacenamiento')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Espacioalmacenamiento entity.
     *
     * @Route("/", name="espacioalmacenamiento_create")
     * @Method("POST")
     * @Template("AppBundle:Espacioalmacenamiento:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Espacioalmacenamiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('espacioalmacenamiento_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Espacioalmacenamiento entity.
     *
     * @param Espacioalmacenamiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Espacioalmacenamiento $entity)
    {
        $form = $this->createForm(new EspacioalmacenamientoType(), $entity, array(
            'action' => $this->generateUrl('espacioalmacenamiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Espacioalmacenamiento entity.
     *
     * @Route("/new", name="espacioalmacenamiento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Espacioalmacenamiento();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Espacioalmacenamiento entity.
     *
     * @Route("/{id}", name="espacioalmacenamiento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Espacioalmacenamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Espacioalmacenamiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Espacioalmacenamiento entity.
     *
     * @Route("/{id}/edit", name="espacioalmacenamiento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Espacioalmacenamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Espacioalmacenamiento entity.');
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
    * Creates a form to edit a Espacioalmacenamiento entity.
    *
    * @param Espacioalmacenamiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Espacioalmacenamiento $entity)
    {
        $form = $this->createForm(new EspacioalmacenamientoType(), $entity, array(
            'action' => $this->generateUrl('espacioalmacenamiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Espacioalmacenamiento entity.
     *
     * @Route("/{id}", name="espacioalmacenamiento_update")
     * @Method("PUT")
     * @Template("AppBundle:Espacioalmacenamiento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Espacioalmacenamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Espacioalmacenamiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('espacioalmacenamiento_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Espacioalmacenamiento entity.
     *
     * @Route("/{id}", name="espacioalmacenamiento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Espacioalmacenamiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Espacioalmacenamiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('espacioalmacenamiento'));
    }

    /**
     * Creates a form to delete a Espacioalmacenamiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('espacioalmacenamiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
