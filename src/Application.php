<?php

    namespace Ekolo\Component\Installer;

    use Symfony\Component\Console\Application AS SymfonyApplicationConsole;

    class Application extends SymfonyApplicationConsole {

        public function __construct()
        {
            $this->add(new Commands);
        }
    }