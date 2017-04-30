<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController extends Controller
{
    /**
     * @Route("/article", name="allArticle")
     */
    public function allAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $articles = $articleRepo->findAll();

        return $this->render('AppBundle:Article:all.html.twig', array(
            'articles' => $articles
        ));
    }


    /**
     * @Route("/article/{id}", name="detailArticle")
     */
    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $article = $articleRepo->find($id);

        return $this->render('AppBundle:Article:detail.html.twig', array(
            'article' => $article
        ));
    }

}
