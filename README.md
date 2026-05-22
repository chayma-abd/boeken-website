Projectinformatie
Onderdeel	Beschrijving
Naam	BoekenWereld
Vak	Backend Web
Datum	22 mei 2026
Student	Chayma
📖 Inhoudsopgave
Projectbeschrijving - Functionaliteiten - Problemen tijdens ontwikkeling - Installatiehandleiding - Gebruikte bronnen

1. Projectbeschrijving
BoekenWereld is een dynamische website voor boekenliefhebbers. Gebruikers kunnen boeken bekijken, een eigen profiel aanmaken en beheren. De admin kan boeken toevoegen, bewerken en verwijderen. Ook is er een FAQ-sectie en een contactformulier.

Deze website is ontwikkeld als eindopdracht voor het vak Backend Web met behulp van Laravel 13.

2. Functionaliteiten
Functionaliteit	Uitleg
Login / Registratie	Bezoekers kunnen een account aanmaken en inloggen
Admin account	admin@ehb.be / wachtwoord: Password!321
Boeken CRUD	Admin kan boeken toevoegen, bekijken, bewerken en verwijderen
Afbeeldingen	Gebruikers kunnen afbeeldingen uploaden voor boeken en profiel
Profielpagina	Gebruikers kunnen hun naam, gebruikersnaam, verjaardag, bio en profielfoto aanpassen
FAQ pagina	Admin kan vragen en antwoorden per categorie toevoegen
Contactformulier	Bezoekers kunnen berichten sturen, admin kan ze lezen en verwijderen
3. Problemen tijdens ontwikkeling
Tijdens het ontwikkelen ben ik een paar problemen tegengekomen. Hieronder leg ik uit wat het probleem was en hoe ik het heb opgelost.

Probleem 1: PHP werd niet gevonden in de terminal
Foutmelding:

text
php : The term 'php' is not recognized as the name of a cmdlet, function, script file, or operable program.
Wat was het probleem?
Toen ik php in PowerShell typte, herkende Windows het commando niet. Dit kwam omdat PHP niet was toegevoegd aan de Windows PATH.

Hoe heb ik het opgelost?

Ik heb gezocht waar PHP was geïnstalleerd. Omdat ik Laravel Herd gebruik, stond PHP hier: C:\Users\chaym\AppData\Local\Herd\bin\

Ik heb de omgevingsvariabelen geopend via: Deze PC → Eigenschappen → Geavanceerde systeeminstellingen → Omgevingsvariabelen

In het vakje "Gebruikersvariabelen" heb ik Path geselecteerd en op Bewerken geklikt

Ik heb een nieuw pad toegevoegd: C:\Users\chaym\AppData\Local\Herd\bin\

Daarna heb ik PowerShell opnieuw opgestart

Resultaat: php werkte daarna gewoon in de terminal.

Probleem 2: View [books.edit] not found
Foutmelding:

text
InvalidArgumentException: View [books.edit] not found.
Wat was het probleem?
Toen ik op de "Bewerk" knop klikte bij een boek, kreeg ik een foutmelding dat de view niet bestond.

Hoe heb ik het opgelost?

Ik heb gecontroleerd of het bestand edit.blade.php wel bestond in resources/views/books/

Het bleek dat het bestand verkeerd was genoemd (edit.e.blade.php in plaats van edit.blade.php)

Ik heb het bestand hernoemd naar edit.blade.php

Daarna heb ik de cache geleegd met php artisan view:clear

Resultaat: De bewerk pagina werkte daarna normaal.

Probleem 3: Witte pagina / knoppen niet zichtbaar
Wat was het probleem?
Soms zag ik een witte pagina of waren knoppen niet zichtbaar, terwijl ze er in de code wel stonden.

Hoe heb ik het opgelost?

Dit kwam door een CSS probleem; de tekst was wit op een witte achtergrond

Ik heb style="background-color: #3b82f6; color: white;" toegevoegd aan alle knoppen

Ook heb ik de cache regelmatig geleegd met:

php artisan view:clear

php artisan cache:clear

php artisan config:clear

Resultaat: Alle knoppen werden daarna duidelijk zichtbaar.

Probleem 4: Afbeeldingen werden niet getoond
Wat was het probleem?
Geüploade afbeeldingen verschenen niet op de website.

Hoe heb ik het opgelost?

Ik had vergeten de storage link aan te maken

In PowerShell heb ik uitgevoerd: php artisan storage:link

Daarna werden afbeeldingen wel correct getoond

Resultaat: Afbeeldingen waren zichtbaar op de website.

4. Installatiehandleiding
Hieronder staat stap voor stap uitgelegd hoe de docent mijn project kan installeren en testen.

Benodigdheden
Laravel Herd of XAMPP met PHP 8.4+

Composer

Node.js en npm

Git

Stap 1: Repository clonen
Open PowerShell en typ:

bash
git clone https://github.com/chayma-abd/boeken-website.git
Stap 2: Naar de projectmap gaan
bash
cd boeken-website
Stap 3: PHP dependencies installeren
bash
composer install
Stap 4: Node.js dependencies installeren
bash
npm install
npm run build
Stap 5: .env bestand klaarmaken
bash
copy .env.example .env
Stap 6: Application key genereren
bash
php artisan key:generate
Stap 7: Database configureren
Open het .env bestand en zet:

text
DB_CONNECTION=sqlite
Maak daarna een leeg bestand aan:

bash
type nul > database/database.sqlite
Of maak handmatig een bestand database.sqlite aan in de map database/

Stap 8: Migraties uitvoeren (tabellen aanmaken)
bash
php artisan migrate
Stap 9: Storage link maken (voor afbeeldingen)
bash
php artisan storage:link
Stap 10: Server starten
bash
php artisan serve
De website is nu beschikbaar op: http://127.0.0.1:8000

Stap 11: Inloggen als admin
Veld	Waarde
Email	admin@ehb.be
Wachtwoord	Password!321
5. Gebruikte bronnen
Laravel documentatie - https://laravel.com/docs

Laravel Breeze - voor authenticatie

Tailwind CSS - voor styling

ChatGPT - voor hulp bij het oplossen van problemen en het schrijven van enkele code