<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        //guardando las noticaciones que el usuario no a leido en una variable
        $notificaciones = auth()->user()->unreadNotifications;
         
         //limpiar las notificaciones leidas
        auth()->user()->unreadNotifications->markAsRead();

        //retornando la vista dentro de la carpeta notificaciones
        return view('notificaciones.index',[
                                              'notificaciones' => $notificaciones
                                           ]);
    }
}
