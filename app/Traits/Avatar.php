<?php

namespace App\Traits;

trait Avatar {
    public function uploadavatar($avatar){
        
        $filename = 'avatar';

        $path = $avatar->storeAs('avatar/',$filename,config('filesystems.public'));
    }
}