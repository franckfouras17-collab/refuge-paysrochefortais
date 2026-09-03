<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Redimensionne une image uploadée pour qu'elle tienne dans un gabarit
 * maximal (sans agrandir les images plus petites) avant de la stocker,
 * pour éviter que des photos de téléphone (plusieurs Mo, plusieurs
 * milliers de pixels) alourdissent inutilement les pages du site.
 */
class ImageResizer
{
    public static function resizeAndStore(
        UploadedFile $file,
        string $disk,
        string $directory,
        int $maxWidth,
        int $maxHeight,
        int $quality = 82,
    ): string {
        $source = self::readImage($file);

        if (! $source) {
            return $file->store($directory, $disk);
        }

        $width = imagesx($source);
        $height = imagesy($source);
        $ratio = min($maxWidth / $width, $maxHeight / $height, 1);
        $newWidth = max(1, (int) round($width * $ratio));
        $newHeight = max(1, (int) round($height * $ratio));

        $extension = self::extensionFor($file->getMimeType());

        $resized = imagecreatetruecolor($newWidth, $newHeight);

        if (in_array($extension, ['png', 'webp', 'gif'], true)) {
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
        }

        imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $path = trim($directory, '/').'/'.Str::random(32).'.'.$extension;
        $tmpPath = tempnam(sys_get_temp_dir(), 'img');

        match ($extension) {
            'png' => imagepng($resized, $tmpPath, 6),
            'webp' => imagewebp($resized, $tmpPath, $quality),
            'gif' => imagegif($resized, $tmpPath),
            default => imagejpeg($resized, $tmpPath, $quality),
        };

        Storage::disk($disk)->put($path, file_get_contents($tmpPath));

        imagedestroy($source);
        imagedestroy($resized);
        @unlink($tmpPath);

        return $path;
    }

    private static function readImage(UploadedFile $file): \GdImage|false
    {
        $path = $file->getRealPath();

        $source = match ($file->getMimeType()) {
            'image/jpeg', 'image/jpg' => @imagecreatefromjpeg($path),
            'image/png' => @imagecreatefrompng($path),
            'image/webp' => @imagecreatefromwebp($path),
            'image/gif' => @imagecreatefromgif($path),
            default => false,
        };

        if ($source && $file->getMimeType() === 'image/jpeg') {
            $source = self::correctOrientation($source, $path);
        }

        return $source;
    }

    /**
     * Les photos prises au format portrait avec un téléphone sont souvent
     * stockées "à plat" avec un simple indicateur EXIF d'orientation :
     * sans cette correction elles ressortiraient couchées sur le site.
     */
    private static function correctOrientation(\GdImage $image, string $path): \GdImage
    {
        if (! function_exists('exif_read_data')) {
            return $image;
        }

        $exif = @exif_read_data($path);
        $orientation = $exif['Orientation'] ?? 1;

        return match ($orientation) {
            3 => imagerotate($image, 180, 0),
            6 => imagerotate($image, -90, 0),
            8 => imagerotate($image, 90, 0),
            default => $image,
        };
    }

    private static function extensionFor(?string $mimeType): string
    {
        return match ($mimeType) {
            'image/png' => 'png',
            'image/webp' => 'webp',
            'image/gif' => 'gif',
            default => 'jpg',
        };
    }
}
