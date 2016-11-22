<?php

namespace Psi\Bundle\Admin\Controller;

use Psi\Component\Grid\GridFactory;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListController
{
    private $templating;
    private $gridFactory;

    public function __construct(
        GridFactory $gridFactory,
        EngineInterface $templating
    )
    {
        $this->gridFactory = $gridFactory;
        $this->templating = $templating;
    }

    public function index(Request $request)
    {
        $classFqn = $request->attributes->get('class');
        $options = $request->query->all();
        
        $grid = $this->gridFactory->createGrid($classFqn, $options);

        if ($request->getMethod() === 'POST') {
            $grid->performActionFromPostData($request->request->all());
        }

        return new Response($this->templating->render(
            '@PsiAdmin/list.html.twig',
            [
                'grid' => $grid->createView()
            ]
        ));

    }
}
