<?php

namespace ERP\RrhhBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ERP\AdminBundle\Entity\RhPersona;
use Symfony\Component\HttpFoundation\Response;
use ERP\AdminBundle\Form\RhPersonaType;

/**
 * RhPersona controller.
 *
 * @Route("/rrhhpersona")
 */
class RrhhPersonaController extends Controller
{
    /**
     * Lists all RhPersona entities.
     *
     * @Route("/", name="rhpersona_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rhPersonas = $em->getRepository('ERPAdminBundle:RhPersona')->findAll();

        return $this->render('rhpersona/index.html.twig', array(
            'rhPersonas' => $rhPersonas,
        ));
    }

    /**
     * Creates a new RhPersona entity.
     *
     * @Route("/new", name="rhpersona_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rhPersona = new RhPersona();
        $form = $this->createForm('ERP\AdminBundle\Form\RhPersonaType', $rhPersona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rhPersona);
            $em->flush();

            return $this->redirectToRoute('rhpersona_show', array('id' => $rhPersona->getId()));
        }

        return $this->render('rhpersona/newPersonal.html.twig', array(
            'rhPersona' => $rhPersona,
          //  'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RhPersona entity.
     *
     * @Route("/{id}", name="rhpersona_show")
     * @Method("GET")
     */
    public function showAction(RhPersona $rhPersona)
    {
        $deleteForm = $this->createDeleteForm($rhPersona);

        return $this->render('rhpersona/show.html.twig', array(
            'rhPersona' => $rhPersona,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RhPersona entity.
     *
     * @Route("/{id}/edit", name="rhpersona_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RhPersona $rhPersona)
    {
        $deleteForm = $this->createDeleteForm($rhPersona);
        $editForm = $this->createForm('ERP\AdminBundle\Form\RhPersonaType', $rhPersona);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rhPersona);
            $em->flush();

            return $this->redirectToRoute('rhpersona_edit', array('id' => $rhPersona->getId()));
        }

        return $this->render('rhpersona/edit.html.twig', array(
            'rhPersona' => $rhPersona,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RhPersona entity.
     *
     * @Route("/{id}", name="rhpersona_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, RhPersona $rhPersona)
    {
        $form = $this->createDeleteForm($rhPersona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rhPersona);
            $em->flush();
        }

        return $this->redirectToRoute('rhpersona_index');
    }

    /**
     * Creates a form to delete a RhPersona entity.
     *
     * @param RhPersona $rhPersona The RhPersona entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RhPersona $rhPersona)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rhpersona_delete', array('id' => $rhPersona->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
     /**
     * @Route("/datos_esatdo/get", name="datos_esatdo", options={"expose"=true})
     * @Method("GET")
     */
    public function DatosEstadoAction()
    {
        try
        {
            
        $sql = "SELECT es.id AS id, es.nombre_estado AS nombre FROM ctl_estado es";
        $stm = $this->container->get('database_connection')->prepare($sql);
        $stm->execute();
        $data['ArrayEstado'] =$stm->fetchAll();
             return new Response(json_encode($data));
        }
 catch (\Exception $e)
     {
      $data['msj']="Falla al mostras datos";
              return new Response(json_encode($data)); 
            //echo $e->getMessage();   
     }
    }
    /**
     * @Route("/datos_ciudead/get", name="datos_ciudad", options={"expose"=true})
     * @Method("GET")
     */
    public function DatosCiudadAction()
    {
        try
        {
        $request = $this->getRequest();
        $sql = "SELECT c.id AS id, c.nombre_ciudad AS nombre FROM ctl_ciudad c where c.ctl_estado_id=".$request->get('idEstado');
        $stm = $this->container->get('database_connection')->prepare($sql);
        $stm->execute();
        $data['ArrayCiudad'] =$stm->fetchAll();
 
        return new Response(json_encode($data));
        }
 catch (\Exception $e)
     {
      $data['msj']="Falla al mostras datos";
              return new Response(json_encode($data)); 
            //echo $e->getMessage();      
     }
    }
    /**
     * @Route("/registar_persona/get", name="registrar_persona", options={"expose"=true})
     * @Method("GET")
     */
    public function RegistarPersonaAction()
    {
        try
        {
        $request = $this->getRequest();
  
        parse_str($request->get('dato'), $datos);
  
            $RhPersona= new RhPersona();
            
            $idCiudad= $this->getDoctrine()->getRepository('ERPAdminBundle:CtlCiudad')->find($datos['sCiudad']);
            
            $RhPersona->setNombres($datos['txtnombre']);
            $RhPersona->setApellido($datos['txtapellido']);
            $RhPersona->setGenero($datos['genero']);
            $RhPersona->setFechaIngreso(new \DateTime("now"));
            $RhPersona->setFechaNacimiento($datos['fechaNacimiento']);
            
            $RhPersona->setDui($datos['txtdui']);
            $RhPersona->setNit($datos['txtnit']);
            
            $RhPersona->setCorreoelectronico($datos['txtnombre']);
            $RhPersona->setDireccion($datos['txtnombre']);
            $RhPersona->setTelefonoFijo($datos['txtnombre']);
            $RhPersona->setTelefonoMovil($datos['txtnombre']);
            $RhPersona->setCtlCiudad($idCiudad);
          
            $em = $this->getDoctrine()->getManager();
            $em->persist($RhPersona);
            $em->flush();
         $data['msj']="Registrado";
        return new Response(json_encode($data));
        }
 catch (\Exception $e)
     {
     // $data['msj']="Falla al mostras datos";
        $data['msj']=$e->getMessage(); 
              return new Response(json_encode($data)); 
              
     }
    }
}


