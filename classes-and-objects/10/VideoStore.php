<?php

class VideoStore
{
    private array $inventory;
    private bool $isEmpty;

    public function __construct(Video ...$videos)
    {
        $this->inventory = $videos;
        $this->isEmpty = false;
    }

    public function addVideo(Video $video)
    {
        $this->inventory[] = $video;
        $this->isEmpty = false;
    }

    public function isEmpty(): bool
    {
        return $this->isEmpty;
    }

    public function isVideoAvailable(string $title): ?string
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                return $video->isAvailable();
            }
        }
        return null;
    }

    public function checkIfVideoExists(string $title): bool
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                return true;
            }
        }
        return false;
    }

    public function rateVideo(string $title, int $rate)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                $video->rate($rate);
            }
        }
    }

    public function rentVideo(string $title)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                $video->rent();
            }
        }
    }

    public function returnVideo(string $title)
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                $video->return();
            }
        }
    }

    public function listInventory(): void
    {
        foreach ($this->inventory as $video) {
            echo $video->getTitle();
            echo ' | rating: ' . $video->getAverageRate();
            echo ' | ' . $video->isAvailable() . PHP_EOL;
        }
    }
}