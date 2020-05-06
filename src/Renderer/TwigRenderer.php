<?php

declare(strict_types=1);

namespace Setono\TagBag\Renderer;

use Setono\TagBag\Tag\TagInterface;
use Setono\TagBag\Tag\TwigTagInterface;
use Twig\Environment;

final class TwigRenderer implements RendererInterface
{
    /** @var Environment */
    private $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function supports(TagInterface $tag): bool
    {
        return $tag instanceof TwigTagInterface;
    }

    public function render(TagInterface $tag): string
    {
        return $this->environment->render($tag->getTemplate(), $tag->getParameters());
    }
}
