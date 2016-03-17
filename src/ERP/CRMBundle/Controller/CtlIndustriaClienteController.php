<?php

namespace ERP\CRMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ERP\AdminBundle\Entity\CtlIndustriaCliente;
use ERP\AdminBundle\Form\CtlIndustriaClienteType;

/**
 * CtlIndustriaCliente controller.
 *
 * @Route("/admin/CRM/industriacliente")
 */
class CtlIndustriaClienteController extends Controller
{
    /**
     * Lists all CtlIndustriaCliente entities.
     *
     * @Route("/", name="industriacliente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ctlIndustriaClientes = $em->getRepository('ERPAdminBundle:CtlIndustriaCliente')->findAll();

        return $this->render('ERPCRMBundle:ctlindustriacliente/index.html.twig', array(
            'ctlIndustriaClientes' => $ctlIndustriaClientes,
        ));
    }
    


//    /**
//     * Creates a new CtlIndustriaCliente entity.
//     *
//     * @Route("/new", name="admin_industriacliente_new")
//     * @Method({"GET", "POST"})
//     */
//    public function newAction(Request $request)
//    {
//        $ctlIndustriaCliente = new CtlIndustriaCliente();
//        $form = $this->createForm('ERP\AdminBundle\Form\CtlIndustriaClienteType', $ctlIndustriaCliente);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($ctlIndustriaCliente);
//            $em->flush();
//
//            return $this->redirectToRoute('admin_industriacliente_show', array('id' => $ctlIndustriaCliente->getId()));
//        }
//
//        return $this->render('ctlindustriacliente/new.html.twig', array(
//            'ctlIndustriaCliente' => $ctlIndustriaCliente,
//            'form' => $form->createView(),
//        ));
//    }
//
//    /**
//     * Finds and displays a CtlIndustriaCliente entity.
//     *
//     * @Route("/{id}", name="admin_industriacliente_show")
//     * @Method("GET")
//     */
//    public function showAction(CtlIndustriaCliente $ctlIndustriaCliente)
//    {
//        $deleteForm = $this->createDeleteForm($ctlIndustriaCliente);
//
//        return $this->render('ctlindustriacliente/show.html.twig', array(
//            'ctlIndustriaCliente' => $ctlIndustriaCliente,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Displays a form to edit an existing CtlIndustriaCliente entity.
//     *
//     * @Route("/{id}/edit", name="admin_industriacliente_edit")
//     * @Method({"GET", "POST"})
//     */
//    public function editAction(Request $request, CtlIndustriaCliente $ctlIndustriaCliente)
//    {
//        $deleteForm = $this->createDeleteForm($ctlIndustriaCliente);
//        $editForm = $this->createForm('ERP\AdminBundle\Form\CtlIndustriaClienteType', $ctlIndustriaCliente);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($ctlIndustriaCliente);
//            $em->flush();
//
//            return $this->redirectToRoute('admin_industriacliente_edit', array('id' => $ctlIndustriaCliente->getId()));
//        }
//
//        return $this->render('ctlindustriacliente/edit.html.twig', array(
//            'ctlIndustriaCliente' => $ctlIndustriaCliente,
//            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Deletes a CtlIndustriaCliente entity.
//     *
//     * @Route("/{id}", name="admin_industriacliente_delete")
//     * @Method("DELETE")
//     */
//    public function deleteAction(Request $request, CtlIndustriaCliente $ctlIndustriaCliente)
//    {
//        $form = $this->createDeleteForm($ctlIndustriaCliente);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($ctlIndustriaCliente);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('admin_industriacliente_index');
//    }
//
//    /**
//     * Creates a form to delete a CtlIndustriaCliente entity.
//     *
//     * @param CtlIndustriaCliente $ctlIndustriaCliente The CtlIndustriaCliente entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(CtlIndustriaCliente $ctlIndustriaCliente)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('admin_industriacliente_delete', array('id' => $ctlIndustriaCliente->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }

    
  /**
     * 
     *
     * @Route("/industria/data", name="admin_industria_data")
     */
    public function dataterritorioAction(Request $request)
    {
        
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
        $entity = new CtlIndustriaCliente();
     
         
        $start = $request->query->get('start');
        $draw = $request->query->get('draw');
        $longitud = $request->query->get('length');
        $busqueda = $request->query->get('search');
        
        $em = $this->getDoctrine()->getEntityManager();
        $territoriosTotal = $em->getRepository('ERPAdminBundle:CtlIndustriaCliente')->findBy(array('estado'=>1));
        
        $territorio['draw']=$draw++;  
        $territorio['recordsTotal'] = count($territoriosTotal);
        $territorio['recordsFiltered']= count($territoriosTotal);
        
        $territorio['data']= array();
        //var_dump($busqueda);
        //die();
        $arrayFiltro = explode(' ',$busqueda['value']);
        
        //echo count($arrayFiltro);
        $busqueda['value'] = str_replace(' ', '%', $busqueda['value']);
        if($busqueda['value']!=''){
        
                    $dql = "SELECT ind.id, ind.descripcion  ,concat(concat('<input type=\"checkbox\" class=\"checkbox idindustria\" id=\"',ind.id), '\">' as link FROM ERPAdminBundle:CtlIndustriaCliente ind "
                        . "WHERE upper(ind.descripcion) LIKE upper(:busqueda) and ind.estado=1 "
                        . "ORDER BY ind.descripcion DESC ";
                    //Aqui estas trabjando
                   $territorio['data'] = $em->createQuery($dql)
                            ->setParameters(array('busqueda'=>"%".$busqueda['value']."%"))
                            ->getResult();
                    
                   $territorio['recordsFiltered']= count($territorio['data']);
                    
                   $dql = "SELECT ind.id, ind.descripcion ,concat(concat('<input type=\"checkbox\" class=\"checkbox idindustria\" id=\"',ind.id), '\">' as link FROM ERPAdminBundle:CtlIndustriaCliente ind "
                        . "WHERE upper(ind.descripcion) LIKE upper(:busqueda) and ind.estado=1 "
                        . "ORDER BY ind.descripcion DESC ";
                   
                   $territorio['data'] = $em->createQuery($dql)
                            ->setParameters(array('busqueda'=>"%".$busqueda['value']."%"))
                            ->setFirstResult($start)
                            ->setMaxResults($longitud)
                            ->getResult();
       
        }
        else{
            $dql = "SELECT ind.id , ind.descripcion ,concat(concat('<input type=\"checkbox\" class=\"checkbox idindustria\" id=\"',ind.id), '\">' as link FROM ERPAdminBundle:CtlIndustriaCliente ind "
                . " WHERE ind.estado=1 ORDER BY ind.descripcion  DESC ";
            $territorio['data'] = $em->createQuery($dql)
                    ->setFirstResult($start)
                    ->setMaxResults($longitud)
                    ->getResult();
        }
     
        
        return new Response(json_encode($territorio));
    }
    
    
    
    
    
    
    
    
    
 
}
