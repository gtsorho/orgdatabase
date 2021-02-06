<?php

namespace App\Exports;

use App\personalinfo;
use App\relationalinfo;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class userExport implements FromQuery, Responsable, ShouldAutoSize, WithMapping, WithHeadings, WithStyles
{
    use Exportable;

    private $fileName = 'LPWC_membership_list.xlsx';
   
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return personalinfo::query()->with(['reationshipinfo', 'emergencyinfo']);

        // dd( $member);
    }
    public function map($reationshipinfo): array
    {
        return[
            $reationshipinfo->id,
            // $reationshipinfo->profileImg,
            $reationshipinfo->title ,
            $reationshipinfo->name, 
            $reationshipinfo->email ,   
            $reationshipinfo->phone,
            $reationshipinfo->dob,
            $reationshipinfo->noChildren,
            $reationshipinfo->address ,
            $reationshipinfo->hometown ,
            $reationshipinfo->age ,
            $reationshipinfo->status ,
            $reationshipinfo->employmentstat ,
            $reationshipinfo->occupation ,
            $reationshipinfo->profession,

            $reationshipinfo->reationshipinfo->period_of_stay ,
            $reationshipinfo->reationshipinfo->baptized,
            $reationshipinfo->reationshipinfo->berean_center ,
            $reationshipinfo->reationshipinfo->tithe ,
            $reationshipinfo->reationshipinfo->welfare ,
            $reationshipinfo->reationshipinfo->ministry ,
            $reationshipinfo->reationshipinfo->department ,

            $reationshipinfo->emergencyinfo->emergency_name,
            $reationshipinfo->emergencyinfo->emergency_phone,
            $reationshipinfo->emergencyinfo->emergency_relation
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            // 'ProfileImg',
            'Title' ,
            'Name', 
            'Email' ,   
            'Phone',
            'Dob',
            'Address' ,
            'Hometown' ,
            'Age' ,
            'Status' ,
            'noChildren',
            'Employmentstat' ,
            'Occupation' ,
            'Profession' ,
            'Period_of_stay' ,
            'baptized',
            'Berean_center' ,
            'Tithe' ,
            'Welfare' ,
            'Ministry' ,
            'Department' ,
            'Emergency_name',
            'Emergency_phone',
            'Emergency_relation',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size' => 14]],

        ];
    }
}
