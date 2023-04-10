<?php

include 'Video.php';
include 'VideoStore.php';

class Application
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore(new Video('The Matrix'), new Video('Godfather II'));
    }
    function run()
    {
        while (true) {
            echo PHP_EOL;
            echo "Choose the operation you want to perform:\n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to add videos to store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";
            echo "Choose 5 to rate video\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                case 5:
                    $this->rate_video();
                    break;
                default:
                    echo "Sorry, I don't understand you...";
            }
        }
    }

    private function add_movies()
    {
        $video = readline('Enter movie title to add it to inventory: ');
        $this->store->addVideo(new Video($video));
        echo "$video added to inventory." . PHP_EOL;
    }

    private function rent_video()
    {
        $video = readline('Enter video title to rent: ');
        if ($this->store->checkIfVideoExists($video)) {
            if ($this->store->isVideoAvailable($video) === 'available') {
                $this->store->rentVideo($video);
                echo "$video successfully rented." . PHP_EOL;
            } else {
                echo 'Currently video is not available.' . PHP_EOL;
            }
        } else {
            echo 'No such video in the store.' . PHP_EOL;
        }
    }

    private function return_video()
    {
        $video = readline('Enter video title you want to return: ');
        if ($this->store->checkIfVideoExists($video)) {
            if ($this->store->isVideoAvailable($video) !== 'available') {
                $this->store->returnVideo($video);
                echo "$video successfully returned." . PHP_EOL;
            } else {
                echo 'Video is already in store.' . PHP_EOL;
            }
        } else {
            echo 'No such video in the store.' . PHP_EOL;
        }
    }

    private function list_inventory()
    {
        if ($this->store->isEmpty()) {
            echo 'There are no videos in the inventory.' . PHP_EOL;
        } else {
            echo 'Videos in the store: ' . PHP_EOL;
            $this->store->listInventory();
        }
    }

    private function rate_video()
    {
        $video = readline('Type video you want to rate: ');
        if ($this->store->checkIfVideoExists($video)) {
            $rate = readline('Rate video from 1 to 5: ');
            $this->store->rateVideo($video, $rate);
            echo "$video received rating of $rate." . PHP_EOL;
        } else {
            echo 'No such video in the store' . PHP_EOL;
        }
    }
}

$app = new Application();
$app->run();