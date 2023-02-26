<?php

namespace App\Mail;

use App\Models\cutistaff;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalCuti extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $cuti;
    public function __construct(cutistaff $cuti)
    {
        $this->cuti = $cuti;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $datecuti = $this->cuti->created_at->toFormattedDateString();

        return $this->subject('Permohonan Pengajuan Cuti')
            ->view('staff.cuti._emailbodycuti')
            ->with([
                'nama' => $this->cuti->cuti2staff->user->name,
                'tanggal' => $datecuti,
                'urlizin' => url('/cutistaff/' . $this->cuti->cuti2staff->id)
            ]);
    }
}
