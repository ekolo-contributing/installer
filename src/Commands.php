<?php

    namespace Ekolo\Component\Installer;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputArgument;

    /**
     * Class de commandes de l'installation
     * @package class
     * @author Don de Dieu Bolenge <dondedieubolenge@gmail.com>
     */
    class Commands extends Command {

        protected static $defaultName = "new";

        protected function configure() {
            $this->setDescription("Launch creation of a new ekolo project")
                 ->setHelp("Allows you to create a new ekolo application")
                 ->addArgument('name', InputArgument::REQUIRED, 'What is the name of your project?');
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $project = $input->getArgument('name');
			$cmd = preg_match('#windows#i', $_SERVER['OS']) ? "cd" : "ls";
			$dir = \trim(\shell_exec($cmd));
			$dir = $dir.D_S.$project;

            if (file_exists($dir)) {
                $output->writeln([
                    "<error>                                                      </error>",
                    "<error> A project or folder already exists in this directory </error>",
                    "<error>                                                      </error>"
				]);
				
				return Command::FAILURE;
			}else {
				$output->writeln("Creating application files ...");
				$creating = \mkdir($dir);

				if ($creating) {
					$zip = new \ZipArchive;
					$default_project = __DIR__.'/Prototypes/default.zip';

					if ($zip->open($default_project) === TRUE) {
						$zip->extractTo($dir);
                        $zip->close();

						$output->writeln("<info>\n   create : $project".D_S);
						$output->writeln("<info>   create : $project".D_S.'app'.D_S);
						$output->writeln("<info>   create : $project".D_S.'app'.D_S.'Controllers'.D_S);
						$output->writeln("<info>   create : $project".D_S.'app'.D_S.'Controllers'.D_S.'PagesController.php');
						$output->writeln("<info>   create : $project".D_S.'app'.D_S.'Middleware'.D_S);
						$output->writeln("<info>   create : $project".D_S.'app'.D_S.'Middleware'.D_S.'ErrorsMiddleware.php');
						$output->writeln("<info>   create : $project".D_S.'app'.D_S.'Models'.D_S);
						$output->writeln("<info>   create : $project".D_S.'app'.D_S.'Models'.D_S.'PagesModel.php');
						$output->writeln("<info>   create : $project".D_S.'bootstrap'.D_S.'app.php');
						$output->writeln("<info>   create : $project".D_S.'bootstrap'.D_S.'constantes.php');
						$output->writeln("<info>   create : $project".D_S.'bootstrap'.D_S.'helpers.php');
						$output->writeln("<info>   create : $project".D_S.'config'.D_S.'app.php');
						$output->writeln("<info>   create : $project".D_S.'config'.D_S.'database.php');
						$output->writeln("<info>   create : $project".D_S.'config'.D_S.'namespace.php');
						$output->writeln("<info>   create : $project".D_S.'config'.D_S.'path.php');
						$output->writeln("<info>   create : $project".D_S.'public'.D_S.'css'.D_S.'style.css');
						$output->writeln("<info>   create : $project".D_S.'public'.D_S.'img'.D_S.'ekolo-logo.png');
						$output->writeln("<info>   create : $project".D_S.'public'.D_S.'js'.D_S);
						$output->writeln("<info>   create : $project".D_S.'routes'.D_S.'pages.php');
						$output->writeln("<info>   create : $project".D_S.'views'.D_S.'errors'.D_S);
						$output->writeln("<info>   create : $project".D_S.'views'.D_S.'errors'.D_S.'404.php');
						$output->writeln("<info>   create : $project".D_S.'views'.D_S.'errors'.D_S.'error.php');
						$output->writeln("<info>   create : $project".D_S.'views'.D_S.'pages'.D_S.'index.php');
						$output->writeln("<info>   create : $project".D_S.'views'.D_S.'layout.php');
						$output->writeln("<info>   create : $project".D_S.'.env');
						$output->writeln("<info>   create : $project".D_S.'.gitignore');
						$output->writeln("<info>   create : $project".D_S.'.htaccess');
						$output->writeln("<info>   create : $project".D_S.'composer.json');
						$output->writeln("<info>   create : $project".D_S.'ekolo');
						$output->writeln("<info>   create : $project".D_S.'index.php');
						$output->writeln("<info>\n   Access the project directory:");
						$output->writeln("<info>    > cd $project");
						$output->writeln("<info>\n   Install dependencies:");
						$output->writeln("<info>    > composer install");
						$output->writeln("<info>\n   Generate the autoload file:");
						$output->writeln("<info>    > composer dumpautoload -o");
						$output->writeln("<info>\n   Run the app:");
						$output->writeln("<info>    > php ekolo serve");

						return Command::SUCCESS;
					}else {
						$output->writeln([
							"<error>                                                  </error>",
							"<error> Error creating the application, please try again </error>",
							"<error>                                                  </error>"
						]);

						return Command::FAILURE;
					}
				}else {
                    $output->writeln([
                        "<error>                                                  </error>",
                        "<error> Error creating the application, please try again </error>",
                        "<error>                                                  </error>"
					]);
					
					return Command::FAILURE;
                }
			}
        }

    }