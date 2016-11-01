<?php declare(strict_types = 1);

namespace Example\Template;

interface Renderer
{
    public function render($template, $data = []) : string;
}