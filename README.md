# Aplikacja do zarządzania listami zakupów

### Wymogi aplikacji zgodnie z umową:

1. możliwość tworzenia przez uiytkowników listy zakupdw {etap 1. projektu},
2. możliwość dodawania wtasnych przepisdw oraz ich udostgpniania innym uiytkownikom strony
   etap 2. projektu),
3. możliwość tworzenia indywidualnego kanta uiytkawnika {etap 1. projektu},
4. opcje wyboru kanta premium lub darmowego {etap 2. projektu},
5. kanto premium będzie przekierowywało do pośrednika płatności PAYPAL, STRIPE lub PADDIE
   (etap 2" projektu),
6. trzy różne wizuatnie i opcjonalnie panele użytkownika:
   a) panel dla użytkownika zalogowanego w opcji kanta darmowego {etap 1" projektu},
   b) panel dla użytkownika zalogowanego w opcji konta premium {etap 2" projektul
   cl panei administratora {etap 2. projektu}"
   oraz stronę główną dla niezalogowanego uiytkownika (etap l.projektu).

### Implementacja
### Strip
Aplikacja używa ```STRIPE``` jako pośrednika płatności. Należy utworzyć konto na stronie: https://dashboard.stripe.com/register
a następnie w pliku ze zmiennymi środowiskowymi .env w odpowiednim miejscu wkleić dane: STRIPE_KEY, STRIPE_SECRET .

Jako, że cena abonamentu jest ustawiona po stronie STRIPE, należy w pliku ```config/services``` ustawić odpowiednią wartość w kluczu ```premium_price``` 
podać odniesienie do ceny z panelu STRIPE (format: price_1JUn2bB......)

### Email
Należy w pliku .env ustawić dane do wysyłania emaili:
```
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```
## Aby zainstalować aplikację lokalnie należy:

Pobrać aplikację przez ```git clone https://github.com/smigiela/weekly-shopping-list.git``` <br>
Wejść do katalogu z aplikacją  ```cd weekly-shopping-list``` <br>
Następnie utworzyć plik ze zmiennymi środowiskowymi na podstawie przykładowego: ```cp .env.example .env``` <br>
W pliku .env podać dane do logowania do bazy danych, stripe, oraz dane dotyczące poczty email (WAŻNE! Bez tego nie będzie możliwa poprawna rejestracja) <br>
Następnie w terminalu wydać kolejno polecenia:
```
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run dev
php artisan storage:link
php artisan serve
```
Właśnie utworzyliśmy bazę danych, zapełniliśmy ją produktami w języku pl i włączyliśmy aplikację pod adresem: localhost:8000
Można się zarejestrować pod adresem: ```http://localhost:8000/register``` i używać aplikacji lokalnie.

## Wdrożenie na serwer
Przez ftp wysyłamy pliki na docelowy serwer (UWAGA! Nie wgrywamy katalogów /vendor /node_modules .git .idea). <br> Domene przekierowujemy na katalog ```/public``` w folderze aplikacji. Następnie łączymy się przez
SSH do serwera, przechodzimy do katalogu głównego aplikacji i: <br>

Tworzymy plik ze zmiennymi środowiskowymi: ```cp .env.example .env``` <br>
W pliku .env podajemy dane do logowania do bazy danych (zgodnie z danymi dostawcy bazy danych), dane stripe oraz dostęp do email. Aby go edytować w konsoli należy wpisać ```nano .env``` <br>
Następnie w terminalu wydać kolejno polecenia:
```
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```
Aplikacja powinna działać poprawnie.

## Uwagi
- Pliki z tłumaczeniami znajdują się w katalogu: ```resources/lang``` <br>
- Aby zapchać bazę danych innymi danymi należy w pliku ```database/seeders/DatabaseSeeder.php``` odkomentować odpowiednie wiersze a następnie odświeżyć bazę danych przez ```php artisan migrate:fresh --seed``` w terminalu.

## Do zrobienia:
- Dodać politykę prywatnośći, regulamin
- Dodać instrukcję dla użytkowników
