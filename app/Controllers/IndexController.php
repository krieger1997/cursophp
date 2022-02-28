<?php
namespace App\Controllers;
// use App\Models\Job;
// use App\Models\Project;
use App\Models\{Project, Job};
class IndexController{
    public function indexAction(){
        // echo 'index action';


        $jobs = Job::all();
        $projects = Project::all();

        $name = "CLAUDIO CABRERA";
        include "../views/index.php";
        
        
    }
}