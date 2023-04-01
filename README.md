## Blog Test_Application
Denumirea proiectului: midNight_TEST_app
Scop: Adaugarea postari intr-o aplicatie de tip blog
Use Cases: 
1. Userul isi poate crea un cont, accesand ruta "app_url/register"
2. User existent se poate loga, accesand ruta "app_url/login"
3. Userul logat poate vedea postarile din blog, ruta "app_url/posts"
4. Userul logat poate adauga postari in blog, ruta "app_url/posts/store"
5. Userul logat poate vizualiza o postare, ruta "app_url/posts/{id}"
6. Userul logat poate sterge o postare, ruta "app_url/posts/delete/{id}"
7. Userul logat poate cauta postari, ruta "app_url/posts"
8. Userul logat se poate deloga, ruta "app_url/logout"

## Set up project instructions
1. Pentru a putea rula un proiect Laravel, este nevoie ca in calculator sa fie instalat prealabil limbajul **PHP** si managerul de pachete/librarii **Composer**
* Un exemplu de provider de server PHP, pentru utilizatori Windows, este **XAMPP**, fiind integrata si baza de date **MYSQL** nu mai e nevoie de a fi
instalata aparte. 
2. Fisierul cu proiectul trebuie dezarhivat, si deschis cu un IDE ca PhpStorm sau Visual Studio Code
3. In terminalul IDE-ul sau Command Prompt [utilizatorul navigand prealabil in folderul cu proiectul], trebuie de rulat comanda "composer install",
pentru instalarea tututor pachetelor si dependetelor in proiectul local.
4. La fel in terminal trebuie rulata comanda "npm install", urmata de "npm run dev" pentru instalarea si constructia elementelor de front-end 
din fisierele app.css si app.js
5. Editarea fisierului ".env" este necesara pentru configurarea conectarii la baza de date. Datele de conexiune sunt:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=midnight
   DB_USERNAME=root
   DB_PASSWORD=
6. Dupa editarea ".env" trebuie creata o noua baza de date pentru inregistrarea datelor. Folosindu-ne de XAMPP Control Panel, 
se porneste baza de date si se navigheaza catre interfata web phpMyAdmin, unde se poate de gestionat baza de date, se da click pe 
"Create new database" si se seteaza denumirea pe care am atribut-o in fisierul ".env", in acest caz 'midnight'.
7. Se ruleaza comanda "php artisan migrate", pentru popularea bazei de date cu tabele necesare
8. Se ruleaza comanda "php artisan serve" pentru pornirea serverului localhost. 

##App accessibility 
Aplicatia la fel poate fi clonata de pe contul meu de Github (link mai jos)
["https://github.com/S3RG1U/midnight"]

Aplicatia a fost urcata pe live server si poate fi testata live (link mai jos). A fost facut deploy utilizand Laravel Forge cu server provider AWS
["http://13.50.224.241/register"]

##App tests
Aditional am creat doua Feature Tests pentru a confirma functionalitatea acesteia. Testele valideaza ca utilizatorul poate crea o postare si
doar utilizatorul logat poate crea o postare

Pentru a putea rula testele este nevoie ca in fisierul "phpunit.xml" sa fie adaugate liniile:

" <env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/> "

Pentru a putea utiliza o alta baza de date, nu pe acea aflata in productie
Comanda de rulare a testelor este: [vendor/bin/phpunit tests/Feature/PostsTest.php]

##Other specifications
* Aplicatie are instalata pachetul predefinit de Laravel de autentificare. Deci rutele "/login", "/register" au fost create automat.
* Rutele/callurile API sunt protejate prin middelware ul de autorizare. 
