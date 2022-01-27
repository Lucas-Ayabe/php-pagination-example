<?php

namespace Lucas\Playground;

class HTMLPostDecorator implements IPost
{
    public function __construct(private IPost $post)
    {
    }

    public function output(callable $mapper): mixed
    {
        return $this->post->output($mapper);
    }

    public function __toString(): string
    {
        return $this->post->output(function (array $props) {
            $post = (object) $props;
            return <<<HTML
                <article id="{$post->id}">
                    <h1>{$post->title}</h1>
                    <p>{$post->content}</p>
                </article>
            HTML;
        });
    }
}
