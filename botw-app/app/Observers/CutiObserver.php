<?php
namespace App\Observers;

use App\Models\cutistaff;
use App\Models\User as ModelsUser;
use App\Notifications\izincuti;

class CutiObserver
{
    public function created(cutistaff $cuti)
    {
        $author = $cuti->cuti2staff->user;
        $users = ModelsUser::find($author->id)->first();
        $users->notify(new izincuti($cuti, $author));
    }
}
?>