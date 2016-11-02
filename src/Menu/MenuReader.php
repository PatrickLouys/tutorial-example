<?php declare(strict_types = 1);

namespace Example\Menu;

interface MenuReader
{
    public function readMenu() : array;
}