<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Trainingdate;
use App\Preparingsession;
use App\Trainingsession;


class AddTrainingSessionCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AddTrainingSession:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add training session to database';

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
        $curentTime = date('H:i');
        // get preparingsession and fetch if gymnastic timedate == now and convert to trainingsession 
        // and if trainingsession end make status false
        $preparingsessions = Preparingsession::all();
        if(!$preparingsessions->isEmpty()){
            foreach($preparingsessions as $preparingsession){
                $trainingdate = $preparingsession->trainingdate()->first();
                $students = $preparingsession->students;
                
                if(date('H:i',strtotime($trainingdate->from)) <= $curentTime  && date('H:i',strtotime($trainingdate->to)) > $curentTime && getIdDay(date('D')) == $trainingdate->date){
                    // create new trainingsession and delete preparingsession
                    $trainingsession = new Trainingsession();
                    $trainingsession->coach_id = $preparingsession->coach_id;
                    $trainingsession->gymnastic_id = $preparingsession->gymnastic_id;
                    $trainingsession->trainingdate_id  = $preparingsession->trainingdate_id;
                    $trainingsession->status  = true;
                    $trainingsession->save();
                    if(!$students->isEmpty()){
                        $trainingsession->students()->attach($students);

                    }

                    // delete preparing
                    $preparingsession->delete();

                }elseif(date('H:i',strtotime($trainingdate->to)) <= $curentTime || getIdDay(date('D')) != $trainingdate->date){
                    // delete old preparingsession
                    $preparingsession->delete();
                }
                
            }
        }
        // check if trainingsession end make status false
        $trainingsessions = Trainingsession::where('status','=',1)->get();
        if(!$trainingsessions->isEmpty()){
            foreach($trainingsessions as $trainingsession){
                $trainingdate = $trainingsession->trainingdate()->first();
                if(date('H:i',strtotime($trainingdate->to)) <= $curentTime){
                    $trainingsession->status = false;
                    $trainingsession->save();
                    // make trainingdate status true
                    $trainingdate = $trainingsession->trainingdate()->first();
                    $trainingdate->status = 3;
                    $trainingdate->save();
                }
                
            }
        }
        // refresh status of training date
        $trainingdates = Trainingdate::where('status','=',3)->get();
        foreach($trainingdates as $trainingdate){
            if(date('H:i',strtotime("12:00:00")) == $curentTime || date('H:i',strtotime("12:01:00")) == $curentTime || date('H:i',strtotime("12:03:00")) == $curentTime){
                $trainingdate->status = true;
                $trainingdate->save();

            }

        }
        // refresh status of trainingsession 
        $trainingsessions = Trainingsession::where('status','=',false)->get();
        foreach($trainingsessions as $trainingsession){
            if(date('Y-m-d',strtotime($trainingsession->created_at)) < date('Y-m-d')){
                $trainingsession->status = 3;
                $trainingsession->save();

            }

        }
    }
}
