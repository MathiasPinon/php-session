<?php

declare(strict_types=1);

namespace Service;

use function Symfony\Component\String\s;

class Session
{
    public static function start(){
        if(session_status() == 2)
            return NULL ;
        elseif(session_status()==1)
            if(!headers_sent())
                throw Service\Exception\SessionException;
            elseif(headers_sent())
                session_start();

        elseif(session_status()==0)
            throw Service\Exception\SessionException;
        else
            throw Service\Exception\SessionException; 
    }
}