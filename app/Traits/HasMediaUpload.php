<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HasMediaUpload
{
    /**
     * Relasi ke Media
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
                    ->where('ref_table', $this->getTable())
                    ->orderBy('sort_order');
    }

    /**
     * Get hanya gambar
     */
    public function images()
    {
        return $this->media()->onlyImages();
    }

    /**
     * Get hanya dokumen
     */
    public function documents()
    {
        return $this->media()->onlyDocuments();
    }

    /**
     * Get gambar pertama (cover)
     */
    public function getCoverImageAttribute()
    {
        return $this->images()->first();
    }

    /**
     * Upload multiple files
     */
    public function uploadMedia($files, $captions = [])
    {
        if (!$files) {
            return;
        }

        // Pastikan folder upload ada
        if (!Storage::exists('public/uploads')) {
            Storage::makeDirectory('public/uploads');
        }

        $sortOrder = $this->media()->max('sort_order') ?? 0;

        foreach ($files as $index => $file) {
            $sortOrder++;

            // Generate nama file unik
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            // Simpan file
            $file->storeAs('uploads', $fileName, 'public');

            // Simpan ke database
            $this->media()->create([
                'ref_table' => $this->getTable(),
                'ref_id' => $this->getKey(),
                'file_name' => $fileName,
                'caption' => $captions[$index] ?? null,
                'mime_type' => $file->getMimeType(),
                'sort_order' => $sortOrder,
            ]);
        }
    }

    /**
     * Delete media by ID
     */
    public function deleteMedia($mediaId)
    {
        $media = $this->media()->find($mediaId);

        if ($media) {
            // Hapus file fisik
            if (Storage::exists('public/uploads/' . $media->file_name)) {
                Storage::delete('public/uploads/' . $media->file_name);
            }

            // Hapus dari database
            $media->delete();

            return true;
        }

        return false;
    }

    /**
     * Delete semua media saat model dihapus
     */
    protected static function bootHasMediaUpload()
    {
        static::deleting(function ($model) {
            foreach ($model->media as $media) {
                // Hapus file fisik
                if (Storage::exists('public/uploads/' . $media->file_name)) {
                    Storage::delete('public/uploads/' . $media->file_name);
                }
            }

            // Hapus dari database
            $model->media()->delete();
        });
    }
}