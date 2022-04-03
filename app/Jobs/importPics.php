<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class importPics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    private $original;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($original)
    {
        $this->original = $original;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contents = file_get_contents($this->original);
        $urlchunks = explode("/",$this->original);
        $dirname = $urlchunks[count($urlchunks)-2];
        $filename = $urlchunks[count($urlchunks)-1];
        $filepath = '/accommodation-pics/' . $dirname . '/';

        $localFull =  $filepath . $filename;
        $localThumb =  $filepath . 'th_'.$filename;

        Storage::disk('s3')->put($localFull, $contents, 'public');

        $thumbnail = Image::make($contents)->resize(500,250);
        Storage::disk('s3')->put($localThumb, $thumbnail->encode(), 'public');
    }
}
