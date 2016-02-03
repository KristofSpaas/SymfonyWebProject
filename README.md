# SymfonyWebProject

# Installation
1) git clone https://github.com/KristofSpaas/SymfonyWebProject.git  <br />
2) composer install  <br />
3) bin/console doctrine:database:create  <br />
4) bin/console doctrine:schema:update --force  <br />

# Register as admin
1) open src/AppBundle/Controller/Registercontroller  <br />
2) Go to line 47  <br />
3) change 'ROLE_PATIENT' to 'ROLE_ADMIN'  <br />

# the folder 'DenDokteurAngular' contains a different project. You will need to run this separately. It contains a frontend that communicates with the Api.
