<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Archivo;
use AppBundle\Entity\Directorio;
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
                     ->select('a.nombre','a.id')
                     ->from('AppBundle:Archivo', 'a')
            ;
            $entities = $qb->getQuery()->getResult();
        
            $qb1 = $em->createQueryBuilder()
                     ->select('d.nombre', 'd.path', 'd.id')
                     ->from('AppBundle:Directorio', 'd')
            ;
            $entities1 = $qb1->getQuery()->getResult();


            return array(
                'entities' => $entities,
                'entities1' => $entities1
            );
    }
    else
        return $this->redirect($this->generateUrl('acceso_login'));
    }

}
