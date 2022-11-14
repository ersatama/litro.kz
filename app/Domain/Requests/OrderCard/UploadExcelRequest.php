<?php

namespace App\Domain\Requests\OrderCard;

use App\Domain\Contracts\Contract;
use App\Domain\Requests\MainRequest;

class UploadExcelRequest extends MainRequest
{
    public function rules():array
    {
        return [
            Contract::FILE  =>  'required|max:104857600|mimetypes:application/csv,application/excel,application/vnd.ms-excel, application/vnd.msexcel,text/csv, text/anytext, text/plain, text/x-c,text/comma-separated-values,inode/x-empty,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            Contract::TIME  =>  'required'
        ];
    }

    public function checked():array
    {
        $data   =   $this->validator->validated();
        $name   =   $data[Contract::TIME] . '.' . $data[Contract::FILE]->extension();
        file_put_contents($name, file_get_contents($data[Contract::FILE]));
        return [
            Contract::NAME  =>  $name,
            Contract::TIME  =>  $data[Contract::TIME]
        ];
    }
}
