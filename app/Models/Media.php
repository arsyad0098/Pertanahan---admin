<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order',
    ];

    /**
     * Accessor untuk mendapatkan URL file
     */
    public function getFileUrlAttribute()
    {
        return asset('storage/uploads/' . $this->file_name);
    }

    /**
     * Accessor untuk URL (alias untuk file_url)
     */
    public function getUrlAttribute()
    {
        return $this->file_url;
    }

    /**
     * Accessor untuk mendapatkan path lengkap file
     */
    public function getFilePathAttribute()
    {
        return storage_path('app/public/' . $this->file_name);
    }

    /**
     * Check apakah file adalah gambar
     */
    public function isImage()
    {
        return strpos($this->mime_type, 'image/') === 0;
    }

    /**
     * Check apakah file adalah PDF
     */
    public function isPdf()
    {
        return $this->mime_type === 'application/pdf';
    }

    /**
     * Check apakah file adalah dokumen
     */
    public function isDocument()
    {
        $documentTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];

        return in_array($this->mime_type, $documentTypes);
    }

    /**
     * Get icon berdasarkan tipe file
     */
    public function getIconAttribute()
    {
        if ($this->isImage()) {
            return 'bi-image';
        } elseif ($this->isPdf()) {
            return 'bi-file-pdf';
        } elseif (strpos($this->mime_type, 'word') !== false) {
            return 'bi-file-word';
        } elseif (strpos($this->mime_type, 'excel') !== false || strpos($this->mime_type, 'spreadsheet') !== false) {
            return 'bi-file-excel';
        }

        return 'bi-file-earmark';
    }

    /**
     * Scope untuk filter berdasarkan referensi
     */
    public function scopeForReference($query, $refTable, $refId)
    {
        return $query->where('ref_table', $refTable)
                     ->where('ref_id', $refId)
                     ->orderBy('sort_order');
    }

    /**
     * Scope untuk hanya gambar
     */
    public function scopeOnlyImages($query)
    {
        return $query->where('mime_type', 'LIKE', 'image/%');
    }

    /**
     * Scope untuk hanya dokumen
     */
    public function scopeOnlyDocuments($query)
    {
        return $query->where(function($q) {
            $q->where('mime_type', 'application/pdf')
              ->orWhere('mime_type', 'LIKE', '%word%')
              ->orWhere('mime_type', 'LIKE', '%excel%')
              ->orWhere('mime_type', 'LIKE', '%spreadsheet%');
        });
    }

    /**
     * Check apakah file exists
     */
    public function fileExists()
    {
        return Storage::disk('public')->exists('uploads/' . $this->file_name);
    }
}