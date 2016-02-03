# SymfonyWebProject

# Installation
1) git clone https://github.com/KristofSpaas/SymfonyWebProject.git
2) composer install
3) bin/console doctrine:database:create
4) bin/console doctrine:schema:update --force

# Register as admin
1) open src/AppBundle/Controller/Registercontroller
2) Go to line 47
3) change 'ROLE_PATIENT' to 'ROLE_ADMIN'

# the folder 'DenDokteurAngular' contains a different project, you will need to run this separately. It contains a frontend that communicates with the Api.
