<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\User;

class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'questions:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive quote to everyone daily via email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }  

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $questions = [
            'Hey admin,in the past 48 hours, you received X answers to your text questions,' => 'http://localhost/lapi/public/api/questions'
        ];
         
        // Setting up a random word
        $key = array_rand($questions);
        $data = $questions[$key];
         
        $users = User::all();
        foreach ($users as $user) {
            Mail::raw("{$key} -> {$data}", function ($mail) use ($user) {
                $mail->from('atikulhoque17@gmail.com.com');
                $mail->to($user->email)
                    ->subject('All answer has been attached');
            });
        }
         
        $this->info('Successfully Answer send to everyone.');


        Question::truncate();

        $this->info('deletes all question answers with an
empty value from the past 24 hours.');
    }
}