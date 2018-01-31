<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Objective;

class ObjectiveAdded extends Mailable
{
    use Queueable, SerializesModels;
    

    protected $objective;
    protected $manager;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Objective $objective)
    {
        $this->objective = $objective;
        $this->manager = \Auth::user()->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('olo@apck.de')
                    ->view('mail.new')->with([
                        'objectiveId' => $this->objective->id,
                        'objectiveEmployee' => $this->objective->employee->name,
                        'objectiveText' => $this->objective->objective,
                        'objectiveDate' => $this->objective->updated_at,
                        'manager' => $this->manager])
                    ->subject('PX: New objective added');
    }
}
