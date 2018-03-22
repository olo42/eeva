<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Objective;

class ObjectiveEvaluated extends Mailable
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
        return $this->view('mail.evaluated')->with([
                        'objectiveId' => $this->objective->id,
                        'objectiveEmployee' => $this->objective->employee->name,
                        'objectiveText' => $this->objective->objective,
                        'objectiveDate' => $this->objective->updated_at,
                        'manager' => $this->manager,
                        'evaluation' => $this->objective->evaluation,
                        'evaluationComment' => $this->objective->comment,
                        'mcxCoreValues' => $this->objective->mcx_core_values,
                        'personalCommitment' => $this->objective->personal_development,
                        'careerAspiration' => $this->objective->career_aspiration,
                        'training' => $this->objective->training])
                    ->subject('PX: Objective(s) evaluated');
    }
}
