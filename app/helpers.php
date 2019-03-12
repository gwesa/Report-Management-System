<?php


function flash_success($message)
{
    session()->flash('message_success', $message );
}

function flash_fail($message)
{
    session()->flash('message_fail', $message );
}

function flash_if_success_or_fail($item)
{
    $item ? flash_success( \Lang::get('message.success')) : flash_fail(\Lang::get('message.fail') );
}
