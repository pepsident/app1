<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestSalinanPutusan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $data2, $data3, $data4, $data5)
    {
        //
        $this->data = $data;
        $this->data2 = $data2;
        $this->data3 = $data3;
        $this->data4 = $data4;
        $this->data5 = $data5;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('zefanyachristian95@gmail.com')
                    ->view('emailku')
                    ->with(
                        [
                            'nama' => $this->data,
                            'website' => 'http://pn-tanjungredeb.go.id/',
                            'jenis' =>$this->data2,
                            'pihak1' => $this->data3,
                            'jam' => $this->data4,
                            'pengambil' => $this->data5,
                        ]
                        );
    }
}
