<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

interface TwigTagInterface extends TagInterface
{
    /**
     * Returns the twig template
     */
    public function getTemplate(): string;

    /**
     * Returns the context to inject into the twig template when rendered
     */
    public function getContext(): array;
}
