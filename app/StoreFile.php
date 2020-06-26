<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreFile extends Model
{
    public function size()
	{
		$filesize=$this->file_size;
	    $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

	    for ($i = 0; $filesize > 1024; $i++) {
	        $filesize /= 1024;
	    }

	    return round($filesize, 2) . ' ' . $units[$i];
	}
}
