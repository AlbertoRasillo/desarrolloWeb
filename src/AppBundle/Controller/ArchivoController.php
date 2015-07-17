<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Archivo;
use AppBundle\Entity\Directorio;
use AppBundle\Form\ArchivoType;
use AppBundle\Form\UploadFileType;


/**
 * Archivo controller.
 *
 * @Route("/archivo")
 * 
 */
class ArchivoController extends Controller
{

    /**
     * Lists all Archivo entities.
     *
     * @Route("/", name="archivo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    
    $session = $this->get('Session');
    $us=$session->get('usuario');
    if($us){
            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository('AppBundle:Archivo')->findAll();

            return array(
                'entities' => $entities,
            );
    }
    else
        return $this->redirect($this->generateUrl('acceso_login'));
    }
    /**
     * Displays a form to create a new Archivo entity.
     *
     * @Route("/upload/{id}", name="upload_file")
     * @Method("GET")
     * @Template("AppBundle:Archivo:upload.html.twig")
     */
    public function uploadAction($id)
    {
        $form = $this->createForm(new UploadFileType(), null, array(
            'action' => $this->generateUrl('do_upload_file'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Subir'));

        $form->get('id')->setData($id);
        return array(
            'form'   => $form->createView(),
        );
    }


    /**
     * Guarda el archivo
     *
     * @Route("/upload", name="do_upload_file")
     * @Method("POST")
     */
    public function doUploadAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(new UploadFileType(), null);
        $form->handlerequest($request);
        $data = $form->getData();

        //print_r($data);exit;
        $uploadedFile = $data['file'];
        $iddirec = $data['id']; 
        $archivo = new Archivo();
        //print_r($archivo);exit;
        $archivo->setNombre($uploadedFile->getClientOriginalName());
        $archivo->setTipo($uploadedFile->guessClientExtension());  
        $archivo->setMimetype($uploadedFile->getClientMimeType());
        $archivo->setTamano($uploadedFile->getClientSize());

        $hash = md5_file($uploadedFile->getRealPath());
        $archivo->setHash($hash);
        $directorio = $em->getReference('AppBundle\Entity\Directorio', $iddirec);

        $uploadedFile->move("/var/www/symfony/web/upload_files",$uploadedFile->getClientOriginalName());

        $archivo->setDirectorio($directorio);

        $em->persist($archivo);
        $em->flush();

        return $this->redirect($this->generateUrl('principal'));
    }


    /**
     * Encuentra por id a un archivo y lo elimina
     *
     * @Route("/eliminar/{id}", name="archivo_eliminar")
     * @Method("GET")
     * @Template()
     */
    public function eliminarArchivoAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Archivo')->find($id);

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('principal'));

    }


    /**
     * Descarga fichero
     *
     * @Route("/descarga/{id}", name="archivo_descarga")
     * @Method("GET")
     */
    public function downloadAction($id)
    {
    $request = $this->get('request');
    $path = $this->get('kernel')->getRootDir(). "/../web/upload_files/";
    $content = file_get_contents($path.$id);

    $response = new Response();

    //set headers
    $response->headers->set('Content-Type', 'mime/type');
    $response->headers->set('Content-Disposition', 'attachment;filename="'.$id);

    $response->setContent($content);
    return $response;
    }

}