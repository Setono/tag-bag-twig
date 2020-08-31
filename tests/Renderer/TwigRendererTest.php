<?php

declare(strict_types=1);

namespace Setono\TagBag\Renderer;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Setono\TagBag\Tag\Tag;
use Setono\TagBag\Tag\TwigTag;
use Twig\Environment;

/**
 * @covers \Setono\TagBag\Renderer\TwigRenderer
 */
final class TwigRendererTest extends TestCase
{
    /**
     * @test
     */
    public function it_supports_twig_tag_interface(): void
    {
        $renderer = new TwigRenderer($this->getEnvironment());

        self::assertTrue($renderer->supports(new TwigTag('template')));
    }

    /**
     * @test
     */
    public function it_does_not_support_tag_interface(): void
    {
        $renderer = new TwigRenderer($this->getEnvironment());

        self::assertFalse($renderer->supports(new class() extends Tag {
        }));
    }

    /**
     * @test
     */
    public function it_renders(): void
    {
        $env = $this->getEnvironment();
        $env
            ->method('render')
            ->with('template', ['context_key' => 'context_value'])
            ->willReturn('content')
        ;

        $renderer = new TwigRenderer($env);

        $tag = new TwigTag('template', [
            'context_key' => 'context_value',
        ]);

        self::assertSame('content', $renderer->render($tag));
    }

    /**
     * @return Environment|MockObject
     */
    private function getEnvironment(): Environment
    {
        return $this->createMock(Environment::class);
    }
}
