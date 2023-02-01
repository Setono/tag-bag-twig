<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class TwigTag extends TemplateTag implements TwigTagInterface
{
    protected string $name = 'setono_tag_bag_twig_tag';

    /**
     * @param mixed $value
     */
    public function addContext(string $key, $value): self
    {
        $this->context[$key] = $value;

        return $this;
    }
}
