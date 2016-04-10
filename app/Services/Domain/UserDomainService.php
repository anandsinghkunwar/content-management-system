<?php

namespace App\Services\Domain;

use App\Contracts\Domain\IUserDomainContract;
use App\Models\User;

class UserDomainService implements IUserDomainContract
{
    public function getUser($id)
    {
        return User::find($id);
    }
    public function getUserWithLevels($id)
    {
        return User::where('id',$id)->with('levels')->first();
    }

    public function changeLevel($userId, $newLevelId)
    {
        $user = User::find($userId);
        $user->level = $newLevelId;
        $user->save();
        return $user;
    }

    public function getIdsFromEmails($emailList)
    {
        if (count($emailList) > 0)
            return User::whereIn('email', $emailList)->lists('id')->all();
        else
            return [];
    }
}