<?php

namespace App\Notifications;

use App\Models\cutistaff;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class izincuti extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $cuti ,$user;

    public function __construct(cutistaff $cuti, User $user)
    {
        $this->cuti = $cuti;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/cutistaff/' . $this->user->staff->id);
        $staffnya = $this->user;
        $posisi = $this->user->staff->jabatan->nama_jabatan;
        $ket_cuti = $this->cuti->keterangan;
        
        return (new MailMessage)
            ->subject('Permohonan Pengajuan Cuti oleh' . $staffnya->name)
            ->markdown('staff.cuti._emailbodycuti', compact('url', 'staffnya', 'ket_cuti', 'posisi'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'cuti_id' => $this->cuti->id,
            'user_id' => $this->user->id,
            'jabatan' => $this->user->staff->jabatan->nama_jabatan,
            'user_name' => $this->user->name,
            'pap' => $this->user->profile_picture,
            'datacuti' => $this->cuti->keterangan,
        ];
    }
}