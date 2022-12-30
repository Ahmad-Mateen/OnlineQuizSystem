<?php

use App\Models\Subject;
use App\Models\User;

function totalUsers(){
    return User::count();
}
function totalSubjects(){
    return Subject::count();
}