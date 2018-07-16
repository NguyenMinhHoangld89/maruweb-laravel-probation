<?php
use Illuminate\Support\Facades\Storage;
function showImage($path){
    return '<img src="'.Storage::url($path).'" class="img-thumbnail" style="width: 150px">';
}