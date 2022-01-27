<?php

namespace Lucas\Playground;

class Post implements IPost
{
    private function __construct(
        private int $id,
        private string $title,
        private string $content
    ) {
        # code...
    }

    public static function create(
        int $id,
        string $title,
        string $content
    ) {
        return new Post($id, $title, $content);
    }

    public function output(callable $mapper): mixed
    {
        return $mapper([
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ]);
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}
