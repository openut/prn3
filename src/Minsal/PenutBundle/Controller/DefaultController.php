<?php

namespace Minsal\PenutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    
    /**
     * @Route("/notas/{nota1}/{nota2}")
     * @Template("MinsalPenutBundle:Default:notas.html.twig")
     */
    public function notasAction($nota1,$nota2)
    {
        $em = $this->getDoctrine()->getManager();
        
        $q = $em->createQuery("select a from Minsal\PenutBundle\Entity\Nota a where a.notaFinal >= $nota1 and a.notaFinal <=$nota2");
        $entities = $q->getResult();  

        return array(
            'entities' => $entities,
        );
    }
}
