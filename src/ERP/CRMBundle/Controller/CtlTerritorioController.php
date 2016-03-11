<?php

namespace ERP\CRMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ERP\CRMBundle\Entity\CtlTerritorio;
use ERP\CRMBundle\Form\CtlTerritorioType;

/**
 * CtlTerritorio controller.
 *
 * @Route("/admin/territorio")
 */
class CtlTerritorioController extends Controller
{
    /**
     * Lists all CtlTerritorio entities.
     *
     * @Route("/", name="admin_territorio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ctlTerritorios = $em->getRepository('ERPCRMBundle:CtlTerritorio')->findAll();

        return $this->render('ctlterritorio/index.html.twig', array(
            'ctlTerritorios' => $ctlTerritorios,
        ));
    }
    
 
    
    /**
     * Creates a new CtlTerritorio entity.
     *
     * @Route("/new", name="admin_territorio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ctlTerritorio = new CtlTerritorio();
        $form = $this->createForm('ERP\CRMBundle\Form\CtlTerritorioType', $ctlTerritorio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ctlTerritorio);
            $em->flush();

            return $this->redirectToRoute('admin_territorio_show', array('id' => $ctlTerritorio->getId()));
        }

        return $this->render('ctlterritorio/new.html.twig', array(
            'ctlTerritorio' => $ctlTerritorio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CtlTerritorio entity.
     *
     * @Route("/{id}", name="admin_territorio_show")
     * @Method("GET")
     */
    public function showAction(CtlTerritorio $ctlTerritorio)
    {
        $deleteForm = $this->createDeleteForm($ctlTerritorio);

        return $this->render('ctlterritorio/show.html.twig', array(
            'ctlTerritorio' => $ctlTerritorio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CtlTerritorio entity.
     *
     * @Route("/{id}/edit", name="admin_territorio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CtlTerritorio $ctlTerritorio)
    {
        $deleteForm = $this->createDeleteForm($ctlTerritorio);
        $editForm = $this->createForm('ERP\CRMBundle\Form\CtlTerritorioType', $ctlTerritorio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ctlTerritorio);
            $em->flush();

            return $this->redirectToRoute('admin_territorio_edit', array('id' => $ctlTerritorio->getId()));
        }

        return $this->render('ctlterritorio/edit.html.twig', array(
            'ctlTerritorio' => $ctlTerritorio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CtlTerritorio entity.
     *
     * @Route("/{id}", name="admin_territorio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CtlTerritorio $ctlTerritorio)
    {
        $form = $this->createDeleteForm($ctlTerritorio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ctlTerritorio);
            $em->flush();
        }

        return $this->redirectToRoute('admin_territorio_index');
    }

    /**
     * Creates a form to delete a CtlTerritorio entity.
     *
     * @param CtlTerritorio $ctlTerritorio The CtlTerritorio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CtlTerritorio $ctlTerritorio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_territorio_delete', array('id' => $ctlTerritorio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
