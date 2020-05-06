<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

final class TwigTag extends Tag implements TwigTagInterface
{
    /** @var string */
    private $template;

    /** @var array */
    private $context = [];

    public function __construct(string $key, string $template)
    {
        parent::__construct($key);

        $this->template = $template;
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
