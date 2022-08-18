<?php
namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
trait UserTrait {
    public function getProfilelinkAttribute()
    {
        return route('users.edit', ['user' => $this->id]);
    }

    public function getAvatarlinkAttribute()
    {
        if(Storage::disk('public')->exists($this->avatar))
        {
            return Storage::disk('public')->url($this->avatar);
        }
        return asset('assets/img/avatar/avatar-1.png');
    }

    public function getIsmeAttribute()
    {
        if(Auth::check() && Auth::id() == $this->id)
        {
            return true;
        }
        return false;
    }
}
