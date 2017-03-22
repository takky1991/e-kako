<?php

function flash($message){
    session()->flash('message', $message);
}

function flashSuccess($message){
    session()->flash('success', $message);
}

function flashError($message){
    session()->flash('error', $message);
}

function fromSlugToTitle($slug){
    return title_case(str_replace('-', ' ', $slug));
}