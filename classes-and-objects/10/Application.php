<?php


class Application
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore();
    }

    function run(): void
    {
        while (true) {
            echo PHP_EOL;
            echo "Choose the operation you want to perform:\n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to add videos to store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to rate video\n";
            echo "Choose 5 to list inventory\n";


            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->rateVideo();
                    break;
                case 5:
                    $this->listInventory($this->store->getAllVideos());
                    break;
                default:
                    echo "Sorry, I don't understand you...";
            }
        }
    }

    private function addMovies(): void
    {
        $title = readline('Enter movie title to add it to inventory: ');
        $this->store->add(new Video($title));
        echo "$title added to inventory." . PHP_EOL;
    }

    private function rentVideo(): void
    {
        $this->listInventory($this->store->getAvailable());

        $videoIndex = readline('Enter video ID number you would like to rent: ');
        $video = $this->store->getByIndex($videoIndex);

        if ($video == null) {
            echo 'No such video in the store.' . PHP_EOL;
            return;
        }

        if ($video->isAvailable()) {
            $this->store->rentVideo($video);
            echo "{$video->getTitle()} successfully rented." . PHP_EOL;
            return;
        }
        echo 'Currently video is not available.' . PHP_EOL;
    }

    private function returnVideo(): void
    {
        $this->listInventory($this->store->getTaken());

        $videoIndex = readline('Enter video ID number you want to return: ');
        $video = $this->store->getByIndex($videoIndex);

        if ($video == null) {
            echo 'No such video in the store.' . PHP_EOL;
            return;
        }

        if (!$video->isAvailable()) {
            $this->store->returnVideo($video);
            echo "{$video->getTitle()} successfully returned." . PHP_EOL;
            return;
        }
        echo 'Video is already in store.' . PHP_EOL;
    }

    private function rateVideo(): void
    {
        $this->listInventory($this->store->getAllVideos());

        $videoIndex = readline('Type in ID number of video you would like to rate: ');
        $video = $this->store->getByIndex($videoIndex);

        if ($video === null) {
            echo 'No such video in the store' . PHP_EOL;
            return;
        }

        $rating = readline('Rate video from 1 to 5: ');

        if ($rating <= 0 || $rating > 5) {
            echo 'Invalid rating' . PHP_EOL;
            return;
        }

        $video->rate($rating);
        echo "{$video->getTitle()} received rating of $rating." . PHP_EOL;
    }

    private function listInventory(array $videos): void
    {
        if (!$this->store->getAllVideos()) {
            echo 'There are no videos in the inventory.' . PHP_EOL;
            return;
        }

        echo 'Videos in the store: ' . PHP_EOL;
        foreach ($videos as $index => $video) {
            /** @var Video $video */
            $available = $video->isAvailable() ? 'available' : 'not available';
            $rating = $video->getAverageRate() == 0 ? 'not rated' : number_format($video->getAverageRate(), 1);
            echo "|$index| {$video->getTitle()} | rating: $rating | $available" . PHP_EOL;
        }
    }
}