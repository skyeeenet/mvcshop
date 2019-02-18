<?php

namespace App\Http\Controllers\Interfaces;


use Illuminate\Http\Request;

interface SiteControllerInterface
{
    function actionIndex();

    function actionContact(Request $request);
}