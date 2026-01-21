<?php

namespace App\Services;

use App\Helpers\MessageHelper;
use App\Integrations\SendPulseIntegration;
use App\Models\Integration;

class NotificationService
{
    protected $emailIntegration;

    public function __construct()
    {
        // Obtém a integração ativa para e-mails
        $emailIntegration = Integration::where('type', 'communication')
            ->whereIn('slug', ['send-pulse', 'mail-grid'])
            ->where('status', 1)
            ->first();

        $this->emailIntegration = $emailIntegration ? app("App\\Integrations\\" . ucfirst(str_replace('-', '', $emailIntegration->slug)) . "Integration") : null;
    }

    /**
     * Envia notificação por E-mail
     */
    public function sendEmail($recipient, $resource, $target, $type, $data)
    {
        if (!$this->emailIntegration) {
            return false;
        }

        $message = MessageHelper::getMessage($resource, $target, $type, $data);

        if (!$message) {
            return false;
        }

        $content = [
            'user_name' => $data['name'],
            'user_email' => $recipient,
            'subject' => $message['subject'],
            'body' => $message['body'],
        ];

        return $this->emailIntegration::sendEmail($content);
    }
}
