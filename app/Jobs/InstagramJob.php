<?php

namespace App\Jobs;

use App\Models\Bidang;
use App\Models\PuprInstagram;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use InstagramScraper\Client;

class InstagramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $client = new Client([
            'rapidapi_key' => '5b7a636637msh5733bd47ccbeab4p1fc1dfjsn446ac6c9bf86'
        ]);
        $instagram = $client->getAccountInfo([
            'username' => 'dinaspuprbjb'
        ]);

        foreach ($instagram['edge_owner_to_timeline_media']['edges']  as $instagramPost) {
            $image = file_get_contents($instagramPost['node']['thumbnail_src']);
            $imageData = base64_encode($image);
            PuprInstagram::updateOrCreate(
                [
                    'code' => $instagramPost['node']['shortcode'],
                    'username' => 'dinaspuprbjb',
                ],
                [
                    'url' => "https://www.instagram.com/p/" . $instagramPost['node']['shortcode'],
                    'thumbnail' => $imageData,
                    'caption' => \Str::words($instagramPost['node']['edge_media_to_caption']['edges'][0]['node']['text'], 10),
                ]
            );
        }

        $bidang = Bidang::where('instagram', '!=' , '')->get();
        foreach ($bidang as $bidangData) {
            $instagramInfo = $client->getAccountInfo([
                'username' => $bidangData->instagram
            ]);

            foreach ($instagramInfo['edge_owner_to_timeline_media']['edges']  as $instagramPost) {
                $image = file_get_contents($instagramPost['node']['thumbnail_src']);
                $imageData = base64_encode($image);
                PuprInstagram::updateOrCreate(
                    [
                        'code' => $instagramPost['node']['shortcode'],
                        'username' => $bidangData->instagram,
                    ],
                    [
                        'url' => "https://www.instagram.com/p/" . $instagramPost['node']['shortcode'],
                        'thumbnail' => $imageData,
                        'caption' => \Str::words($instagramPost['node']['edge_media_to_caption']['edges'][0]['node']['text'], 10),
                    ]
                );
            }
        }

        response()->json(['message' => 'success']);
    }
}
