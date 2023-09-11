<?php

declare(strict_types=1);

namespace Service;

use Exception;
use function Symfony\Component\String\s;

class Session
{
    public static function start(){
        if(session_status() == 2)
            return NULL ;
        elseif(session_status()==1)
            if(headers_sent())
                throw new Exception('Erreur HTTP');
            elseif(!headers_sent())
                session_start();

        elseif(session_status()==0)
            throw new Exception('Erreur Session désactivé');
        else
            throw new Exception(Service\Exception\SessionException );
    }
}