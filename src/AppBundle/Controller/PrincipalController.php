<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Archivo;
use AppBundle\Form\ArchivoType;

/**
 * Principal controller.
 *
 * @Route("/principal")
 */
class PrincipalController extends Controller
{
    /**
     * Pagina principal.
     *
     * @Route("/", name="principal")
     * @Method("GET")
     * @Template("AppBundle:Principal:principal.html.twig")
     */

    public function indexAction()
    {
    
    $session = $this->get('Session');
    $us=$session->get('usuario');
    if($us){
            $em = $this->getDoctrine()->getManager();

            $qb = $em->createQueryBuilder()
                     ->select('a.nombre', 'd.nombre', 'a.id', 'd.id')
                     ->from('AppBundle:Directorio', 'd')
                     ->join('AppBundle:Archivo','a')
                     ->where('d.id = a.iddirectorio')
                     ->groupBy('d.id')
            ;
            $entities = $qb->getQuery()->getResult();

            return array(
                'entities' => $entities,
            );
    }
    else
        return $this->redirect($this->generateUrl('acceso_login'));
    }



}
