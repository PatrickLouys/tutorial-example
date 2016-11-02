<?php declare(strict_types = 1);

namespace Example\Controllers;

use Example\Page\InvalidPageException;
use Example\Template\FrontendRenderer;
use Http\Response;
use Example\Page\PageReader;

class Page
{
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(
        Response $response,
        FrontendRenderer $renderer,
        PageReader $pageReader
    ) {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }

    public function show($params)
    {
        $slug = $params['slug'];

        try {
            $data['content'] = $this->pageReader->readBySlug($slug);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Page not found');
        }

        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}