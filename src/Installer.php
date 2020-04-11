<?php

    namespace Ekolo\Component\Installer;

    use Ekolo\Component\Installer\Console\ApplicationConsole;

    class Installer {
        
        /**
         * Permet de lancer l'Application de l'installer
         * @return void
         */
        public function run()
        {
            (new ApplicationConsole)->run();
        }
    }