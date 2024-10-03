<?php

declare(strict_types=1);

namespace App\Actions;

use App\Exceptions\LogoException;
use App\Models\Kebab;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class StoreLogoAction
{
    public function handle(Kebab $kebab, UploadedFile $file)
    {
        if (isset($kebab->logo_url)) {
            $this->deleteOldLogoFile($kebab->logo_url);
        }

        $filename = $file->hashName();

        $url = $this->storeLogoFile($file, $filename);

        $kebab->update([
            'logo_url' => $url,
        ]);

    }

    private function deleteOldLogoFile(?string $logoUrl)
    {
        $logoParts = explode('/', $logoUrl);
        $oldLogoFileName = end($logoParts);

        if (isset($oldLogoFileName)) {
            $oldLogoFilePath = 'logos/'.$oldLogoFileName;

            try {
                if (Storage::disk('public')->exists($oldLogoFilePath)) {
                    Storage::disk('public')->delete($oldLogoFilePath);
                }
            } catch (Exception $e) {
                throw LogoException::cantDelete();
            }
        }

    }

    private function storeLogoFile(UploadedFile $file, string $filename)
    {
        try {
            Storage::putFileAs('public/logos', $file, $filename);
            $url = URL::to(Storage::url('logos/'.$filename));
        } catch (Exception $e) {
            throw LogoException::cantStore();
        }

        return $url;
    }
}
