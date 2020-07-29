<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('Whaaaaaaaaaaaaaa');
    }

    /**
     * @Route("/question/{slug}")
     */
    public function show($slug)
    {
        $answers = [
            'oubliez pas de boire',
            'habillez vous',
            'avez vous pensé à arrosez les plantes aujourdhui ? ',
        ];

        return $this->render('question/show.html.twig', [
            'question' => $slug,
            'answers' => $answers,
        ]);

    }
}