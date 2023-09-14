<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\PuprInstagram;
use Illuminate\Http\Request;
use InstagramScraper\Client;

class PuprInstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        $client = new Client([
            'rapidapi_key' => '3cf59ecb1bmsh721a48a28886d28p1e9af5jsnbde8b7be3b95'
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


        return response()->json(['message' => 'success']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
