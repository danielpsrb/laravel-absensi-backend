<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, ToModel
{
    private $current = 0;

    public function collection(Collection $collection)
    {

    }

    public function model(array $row)
    {
        $this -> current++;
        if ($this->current > 1)
        {
            $count = User::where('email', '=', $row[1])->count();
            if(empty($count))
            {
                $user = new User;
                $user->name = $row[0];
                $user->email = $row[1];
                $user->password = Hash::make($row[2]);
                $user->nim = $row[3];
                $user->department_id = Department::where('name', $row[4])->first()->id;
                $user->faculty_id = Faculty::where('name', $row[5])->first()->id;
                $user->nip = $row[6];
                $user->role = $row[7];
                $user->save();
            }
        }
    }
}
