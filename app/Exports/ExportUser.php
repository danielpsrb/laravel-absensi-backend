<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportUser implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::join('departments', 'users.department_id', '=', 'departments.id')
                    ->join('faculties', 'users.faculty_id', '=', 'faculties.id')
                    ->select('users.name', 'users.email', 'users.nim', 'departments.name as department_name', 'users.nip', 'users.role', 'faculties.name as faculty_name', 'users.department_id', 'users.faculty_id')
                    ->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'NIM',
            'Program Studi',
            'NIP',
            'Role',
            'Fakultas',
            'department_id',
            'faculty_id',
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            "'" . $user->nim,
            $user->department_name,
            $user->nip,
            $user->role,
            $user->faculty_name,
            $user->department_id,
            $user->faculty_id,
        ];
    }
}
