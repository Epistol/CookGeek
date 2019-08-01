<?php

namespace App\Jobs;

use App\Mail\RoutageDateToRevalidate;
use App\Routage;
use App\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RevalidateRoutage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $message;
    private $routage;
    private $date;

    /**
     * Create a new job instance.
     *
     * @param $message
     * @param Routage $routage
     */
    public function __construct($message, Routage $routage, $date)
    {
        $this->message = $message;
        $this->routage = $routage;
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $mails = collect(['']);
        $admins = User::where('role', 'manager')->orWhere('role', 'admin')
            ->where('email', '!=', '')->get('email');
        $callCenters = User::where('role', 'basic')
            ->where('email', '!=', '')
            ->get('email');
        $author = User::find($this->routage->creator_id)
            ->where('email', '!=', '')
            ->get('email');
        $mails = $mails->merge($admins)->merge($callCenters)->merge($author);
        try {
            Mail::to($mails->slice(1))->send(new RoutageDateToRevalidate($this->routage, $this->date));
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
