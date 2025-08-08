<?php

namespace App\Notifications;

use App\Models\App as ModelsApp;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Facades\App;

class InviteCollaboratorNotification extends Notification
{
    use Queueable;

    protected $app;
    protected $url;
    protected $isNewUser;

    public function __construct(ModelsApp $app, string $url, bool $isNewUser = false)
    {
        $this->app = $app;
        $this->url = $url;
        $this->isNewUser = $isNewUser;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject($this->isNewUser ? "Bạn được mời tham gia {$this->app->name}" : "Bạn đã được thêm vào {$this->app->name}")
            ->greeting('Xin chào!')
            ->line("Bạn được mời cộng tác trên ứng dụng: {$this->app->name}");

        if ($this->isNewUser) {
            $mail->line('Vui lòng bấm nút bên dưới để đặt mật khẩu và kích hoạt tài khoản của bạn.')
                 ->action('Đặt mật khẩu', $this->url);
        } else {
            $mail->line('Bạn có thể truy cập ứng dụng tại liên kết bên dưới:')
                 ->action('Mở ứng dụng', url(config('app.url')));
        }

        $mail->line('Nếu bạn không mong đợi email này, hãy bỏ qua.');

        return $mail;
    }
}
