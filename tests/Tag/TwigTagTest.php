<?php
declare(strict_types=1);

namespace Setono\TagBag\Tag;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\TagBag\Tag\TwigTag
 */
final class TwigTagTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
    {
        $tag = new TwigTag('key', 'template');
        $this->assertInstanceOf(TagInterface::class, $tag);
        $this->assertInstanceOf(TwigTagInterface::class, $tag);
    }

    /**
     * @test
     */
    public function it_has_default_values(): void
    {
        $tag = new TwigTag('key', 'template');

        $this->assertSame('key', $tag->getKey());
        $this->assertSame('template', $tag->getTemplate());
        $this->assertNull($tag->getSection());
        $this->assertSame(0, $tag->getPriority());
        $this->assertIsArray($tag->getDependents());
        $this->assertCount(0, $tag->getDependents());
        $this->assertTrue($tag->willReplace());
        $this->assertIsArray($tag->getParameters());
        $this->assertCount(0, $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_is_mutable(): void
    {
        $tag = new TwigTag('key', 'template');
        $tag->setParameters(['key' => 'value']);

        $this->assertSame(['key' => 'value'], $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_adds_parameters(): void
    {
        $tag = new TwigTag('key', 'template');
        $tag->setParameters(['key1' => 'value1']);
        $tag->addParameter('key2', 'value2');

        $this->assertSame(['key1' => 'value1', 'key2' => 'value2'], $tag->getParameters());
    }
}
