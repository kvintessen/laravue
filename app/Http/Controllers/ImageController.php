<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends Controller
{
    public function getImage(string $filename): BinaryFileResponse|JsonResponse
    {
        $path = resource_path() . '/img/' . $filename;

        if (!File::exists($path)) {
            return response()->json(['message' => 'Image not found.'], 404);
        }

        return response()->file($path, ["Content-Type" => File::mimeType($path)]);
    }
}
