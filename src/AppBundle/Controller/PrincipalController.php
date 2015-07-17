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
     * @Route("/{id}", defaults={"id" = ""}, name="principal")
     * @Route("/", defaults={"id" = ""})
     * @Method("GET")
     * @Template("AppBundle:Principal:principal.html.twig")
     */

    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('Session');
        $us=$session->get('usuario');

        if($us){ 

            $session->set('iddirecactual',$id);
            $iddiractu = $session->get('iddirecactual');
            if($id==""){
               $em = $this->getDoctrine()->getManager();

                $qb = $em->createQueryBuilder()
                         ->select('a.nombre','a.id', 'a.tipo','a.hash','a.tamano')
                         ->from('AppBundle:Archivo', 'a')
                         ->join('a.directorio','d')
                         ->join('d.espacioalmacenamiento', 'e')
                         ->join('e.user', 'u')
                         ->where("d.id = '" .$iddiractu. "'")
                         ->andWhere("u.id = '" .$us->getId(). "'")
                ;
                $entities = $qb->getQuery()->getResult();
                $qb1 = $em->createQueryBuilder()
                         ->select('d.nombre', 'd.path', 'd.id')
                         ->from('AppBundle:Directorio', 'd')
                         ->join('d.espacioalmacenamiento', 'e')
                         ->join('e.user', 'u')
                         ->where("d.path = '/'")
                         ->andWhere("u.id = '" .$us->getId(). "'")
                ;
                $entities1 = $qb1->getQuery()->getResult();
            }
            else{
                $em = $this->getDoctrine()->getManager();

                $qb = $em->createQueryBuilder()
                         ->select('a.nombre','a.id','d.path', 'a.tipo','a.hash','a.tamano')
                         ->from('AppBundle:Archivo', 'a')
                         ->join('a.directorio','d')
                         ->join('d.espacioalmacenamiento', 'e')
                         ->join('e.user', 'u')
                         ->where("d.id = '" .$iddiractu. "'")
                         ->andWhere("u.id = '" .$us->getId(). "'")
                ;
                $entities = $qb->getQuery()->getResult();
                
                $qb1 = $em->createQueryBuilder()
                         ->select('d.nombre', 'd.path', 'd.id')
                         ->from('AppBundle:Directorio', 'd')
                         ->join('d.espacioalmacenamiento', 'e')
                         ->join('e.user', 'u')
                         ->where('d.parent=:id')
                         ->andWhere("u.id = '" .$us->getId(). "'")
                         ->setParameter('id', $id)
                ;
                $entities1 = $qb1->getQuery()->getResult();
                }

            return array(
                'entities' => $entities,
                'entities1' => $entities1
            );
    }
    else
        return $this->redirect($this->generateUrl('acceso_login'));
    }

}
