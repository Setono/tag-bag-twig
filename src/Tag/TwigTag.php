<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

final class TwigTag extends Tag implements TwigTagInterface
{
    /** @var string */
    private $template;

    /** @var array */
    private $parameters = [];

    public function __construct(string $key, string $template)
    {
        parent::__construct($key);

        $this->template = $template;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @param mixed $value
     */
    public function addParameter(string $key, $value): self
    {
        $this->parameters[$key] = $value;

        return $this;
    }
}
