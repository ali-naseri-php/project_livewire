<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MoveUploadedFile
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FileUploaded $event): void
    {
        $sourceFilePath = storage_path('app/public/' . $event->nameFiel);
        $destinationFilePath = public_path('images_post/'.$event->nameFiel);

        // انتقال فایل
        if (file_exists($sourceFilePath)) {
            rename($sourceFilePath, $destinationFilePath);
        }

    }
}
