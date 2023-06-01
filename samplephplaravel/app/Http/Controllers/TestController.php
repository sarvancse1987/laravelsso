<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Closure;

class TestController extends Controller {

 public function __construct() {
      $this->middleware('Role');
   }
   
   public function index() {
      echo "<br>Test Controller.";
   }
}