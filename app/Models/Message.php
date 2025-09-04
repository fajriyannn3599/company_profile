<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'read_at',
        'reply',
        'replied_at',
        'nilai_pembiayaan', // Nilai Pembiayaan (baru)      
        'jenis_produk', // Jenis Produk (baru) 
        'lokasi', // Lokasi (baru)
        'jenis_kendaraan', // Jenis Kendaraan (baru)
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now()
        ]);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'jenis_produk');
    }
}
