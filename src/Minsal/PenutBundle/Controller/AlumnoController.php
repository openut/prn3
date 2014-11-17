<?php

namespace Minsal\PenutBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Minsal\PenutBundle\Entity\Alumno;
use Minsal\PenutBundle\Form\AlumnoType;

/**
 * Alumno controller.
 *
 * @Route("/alumno")
 */
class AlumnoController extends Controller
{

    /**
     * Lists all Alumno entities.
     *
     * @Route("/", name="alumno")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MinsalPenutBundle:Alumno')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Alumno entity.
     *
     * @Route("/", name="alumno_create")
     * @Method("POST")
     * @Template("MinsalPenutBundle:Alumno:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Alumno();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alumno_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Alumno entity.
     *
     * @param Alumno $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Alumno $entity)
    {
        $form = $this->createForm(new AlumnoType(), $entity, array(
            'action' => $this->generateUrl('alumno_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Alumno entity.
     *
     * @Route("/new", name="alumno_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Alumno();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Alumno entity.
     *
     * @Route("/{id}", name="alumno_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MinsalPenutBundle:Alumno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Alumno entity.
     *
     * @Route("/{id}/edit", name="alumno_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MinsalPenutBundle:Alumno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumno entity.');
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
    * Creates a form to edit a Alumno entity.
    *
    * @param Alumno $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Alumno $entity)
    {
        $form = $this->createForm(new AlumnoType(), $entity, array(
            'action' => $this->generateUrl('alumno_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Alumno entity.
     *
     * @Route("/{id}", name="alumno_update")
     * @Method("PUT")
     * @Template("MinsalPenutBundle:Alumno:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MinsalPenutBundle:Alumno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alumno_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Alumno entity.
     *
     * @Route("/{id}", name="alumno_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MinsalPenutBundle:Alumno')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Alumno entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alumno'));
    }

    /**
     * Creates a form to delete a Alumno entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alumno_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}