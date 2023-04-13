<?php

class VideoStore
{
    private array $inventory;

    public function __construct(Video ...$video)
    {
        $this->inventory = $video;
    }

    public function add(Video $title): void
    {
        $this->inventory[] = $title;
    }

    public function rentVideo(Video $video): void
    {
        $video->setAvailable(false);
    }

    public function returnVideo(Video $video): void
    {
        $video->setAvailable(true);
    }

    public function getByIndex(int $index): ?Video
    {
        return $this->inventory[$index] ?: null;
    }

    public function getAllVideos(): array
    {
        return $this->inventory;
    }

    public function getTaken(): array
    {
        return array_filter($this->inventory, function ($video) {
            return $video->isAvailable() == false;
        });
    }

    public function getAvailable(): array
    {
        return array_filter($this->inventory, function ($video) {
            return $video->isAvailable() == true;
        });
    }
}