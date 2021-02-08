<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\UserObjectService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "What's new this week? send weekly emails to subbed users";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserObjectService $userObjects)
    {
        $this->userObjects = $userObjects;
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {

            $dataForEmail = [];

            foreach ($user->objects as $key1 => $object) {
                $dataForEmail[$key1]['object_name'] = $object->name;
                $modules = $object->modules;
                foreach ($modules as $key2 => $module) {
                    $dataForEmail[$key1][$key2]['module_name'] = $module->name;
                    $dataForEmail[$key1][$key2]['module_value'] =
                        $module->getCurrentParams->value . ' ' . $module->type->unit;
                }
            }

            Mail::send('emails.objects_parameters', ['dataForEmail' => $dataForEmail, 'user' => $user], function ($message) use ($user) {
                $message->to($user->email, "$user->name $user->second_name")
                    ->subject('Module parameters');
            });
        }
    }
}
