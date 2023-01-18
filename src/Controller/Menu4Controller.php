<?php

namespace src\Controller;

use src\App\DB;

class Menu4Controller {
    public function step() {
        view('page/recuperation/step');
    }

    public function service() {
        view('page/recuperation/service');
    }
}