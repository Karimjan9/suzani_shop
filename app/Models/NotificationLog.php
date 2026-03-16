<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationLog extends Model
{
    public const STATUS_DRAFT = 'draft';

    public const STATUS_SENT = 'sent';

    public const STATUS_FAILED = 'failed';

    protected $fillable = [
        'title',
        'message',
        'channel',
        'status',
        'recipient',
        'sent_at',
    ];

    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
        ];
    }

    public static function statusOptions(): array
    {
        return [
            static::STATUS_DRAFT => 'Qoralama',
            static::STATUS_SENT => 'Yuborilgan',
            static::STATUS_FAILED => 'Xatolik',
        ];
    }

    public static function channelOptions(): array
    {
        return [
            'system' => 'Tizim',
            'telegram' => 'Telegram',
            'email' => 'Email',
            'sms' => 'SMS',
        ];
    }
}
