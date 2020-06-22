<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class TwigTag extends Tag implements TwigTagInterface
{
    /** @var string */
    private $template;

    /** @var array */
    private $context;

    public function __construct(string $template, array $context = [])
    {
        $this->setName('setono_tag_bag_twig_tag');
        $this->template = $template;
        $this->context = $context;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function setContext(array $context): self
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @param mixed $value
     */
    public function addContext(string $key, $value): self
    {
        $this->context[$key] = $value;

        return $this;
    }
}
