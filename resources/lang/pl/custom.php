<?php

return [
    'global' => [
        'nothing_to_show' => 'Nie ma nic do pokazania',
        'back' => 'Powrót',
        'edit' => 'Edytuj',
        'choose' => 'Wybierz',
        'save' => 'Zapisz',
        'archive' => 'Archiwizuj',
        'delete' => 'Usuń',
        'permanently_delete' => 'Usuń na zawsze!',
        'there' => 'TUTAJ',
        'messages' => [
            'successfully_save' => 'Poprawnie zapisano',
            'successfully_delete' => 'Poprawnie usunięto',
            'successfully_restore' => 'Poprawnie przywrócono',
            'successfully_archived' => 'Zarchiwizowano poprawnie!',
            'successfully_purchase' => 'Płatność udana!',
            'successfully_favourite' => 'Dodano do ulubionych!',
            'successfully_remove_favourite' => 'Usunięto z ulubionych!',
            'dont_have_permission' => 'Nie masz uprawnień do tej akcji',
            'dont_have_permission_message' => 'Próbujesz wykonać akcję do której nie masz uprawnień',
            'dont_have_active_subscription' => 'Nie masz aktywnej subskrypcji.',
            'not_found' => 'Nie znaleziono szukanego elementu',
            'server_error' => 'Błąd serwera',
        ],
        'roles' => [
            'admin_role_name' => 'Administrator',
            'admin_role_description' => 'Administrator może wykonać dowolną akcję w zespole',
            'member_role_name' => 'Członek zespołu',
            'member_role_description' => 'Członek może tylko czytać, tworzyć, edytować listy zkupów i pozycje, nie może ich usuwać',
        ],
        'dashboard' => 'Panel użytkownika',
        'register' => 'Zarejestruj się',
        'login' => 'Zaloguj się',
        'subscription' => 'Twoja subskrypcja',
        'get_subscription' => 'Przejdź na PREMIUM'
    ],
    'nav' => [
        'dashboard' => 'Panel użytkownika',
        'user_dashboard' => 'Panel użytkownika',
        'admin_dashboard' => 'Panel administratora',
        'shopping_lists' => 'Moje listy zakupów',
        'create_weekly_list' => 'Na zakupy!',
        'weekly_list' => 'Lista tygodniowa',
        'recipes' => 'Przepisy',
        'change_language' => 'Zmień język',
        'polish' => 'Polski',
        'english' => 'Angielski',
        'fav_products' => 'Ulubione produkty'
    ],
    'teams' => [
        'team_member_manager_email' => 'Podaj adres email osoby, którą chcesz dodać do tego zespołu. Będziecie mieć równy dostep do list zakupów w zespole.'
    ],
    'shopping_lists' => [
        'global' => [
            'shopping_date' => 'Planowana data zakupu',
            'qty' => 'szt.',
            'g' => 'g', //gram
            'ml' => 'ml',
        ],
        'index' => [
            'header' => 'Twoje listy zakupów',
            'title' => 'Nazwa listy',
            'get_archived' => 'Zarchiwizowane listy'
        ],
        'create' => [
            'header' => 'Dodaj listę zakupów w zespole:',
            'title' => 'Nazwa listy',
            'shopping_date' => 'Data zakupu',
        ],
        'edit' => [
            'header' => 'Edytuj listę zakupów',
            'title' => 'Nazwa listy',
            'shopping_date' => 'Data zakupu',
            'add_positions' => 'Dodaj pozycje do listy',
        ],
        'restore' => [
            'header' => 'Przywracasz listę zakupów - wprowadź nową datę zakupów',
            'shopping_date' => 'Data zakupu',
        ],
        'show' => [
            'header' => 'Widok listy',
            'title' => 'Nazwa listy',
            'shopping_date' => 'Data zakupu',
            'choose_product' => 'Wybierz produkt',
            'amount' => 'Ilość',
            'type' => 'Typ',
            'type_placeholder' => 'Wybierz ilość, objętość lub waga'
        ],
        'weekly_list' => [
            'create' => [
                'header' => 'Stwórz swoją listę tygodniową',
                'button' => 'Generuj',
                'start_date' => 'Data początkowa',
                'end_date' => 'Data końcowa',
            ],
            'show' => [
                'header' => 'Lista zbiorcza',
                'generate_pdf' => 'Wyświetl PDF'
            ],
            'pdf' => [
                'title' => 'Lista zakupów na: ',
                'position_name' => 'Nazwa produktu',
                'amount' => 'Ilość',

            ],
        ],
        'archived_lists' => [
            'index' => [
                'header' => 'Zarchiwizowane listy',
                'restore' => 'Przywróć'
            ],
        ],
    ],
    'positions' => [
        'edit' => [
            'header' => 'Edytuj pozycję',
            'product' => 'Nazwa produktu',
        ]
    ],
    'products' => [
        'index' => [
          'header' => 'Produkty - dodaj do ulubionych!'
        ],
        'create' => [
            'header' => 'Utwórz produkt',
            'name' => 'Nazwa produktu',
            'category' => 'Kategoria produktu',
        ],
    ],
    'home_page' => [
        'nav' => [
            'instruction' => 'Instrukcja'
        ],
        'header' => [
            'bold_text' => 'Zakupy z nami to przygoda',
            'subtitle' => 'Aplikacja do współdzielenia list zakupów z członkami rodziny oraz generowania list zbiorczych - np z tygodnia'
        ],
        'first_section' => [
            'first_card' => [
                'title' => 'Razem z rodziną',
                'subtitle' => 'Jednym kliknięciem udostępnisz swoje listy zakupów członkom rodziny!'
            ],
            'second_card' => [
                'title' => 'Zakupy na tydzień',
                'subtitle' => 'Robisz zakupy na tydzień? Wygeneruj listę zbiorczą!'
            ],
            'third_card' => [
                'title' => 'Zero opłat*',
                'subtitle' => 'Korzystaj bez opłat w fazie beta!'
            ],
            'title' => 'Wiemy jak ważna jest organizacja!',
            'text' => 'Dzięki nam zorganizujesz domowe zakupy z łatwością!',
            'text2' => 'Już niebawem dodamy wbudowane przepisy na potrawy, dzięki którym jednym kliknięciem zaimportujesz produkty z przepisu na Twoją listę zakupów!',
            'card_title' => 'Ciągle się rozwijamy',
            'card_text' => 'Pracujemy cały czas aby aplikacja była coraz lepsza!'
        ],
        'second_section' => [
            'title' => 'Już niebawem...',
            'text' => 'Dostępne przepisy na mnóstwo posiłków! Zaskocz rodzinę cudownym obiadem lub partnera romantyczną kolacją!',
            'first_li' => 'Przepisy na posiłki',
            'second_li' => 'Dostępne od ręki!',
            'third_li' => 'Możliwość dodawania własnych przepisów!',
        ],
        'footer' => [
            'title' => 'Pozostań w kontakcie!',
            'subtitle' => 'Pozostań w kontakcie!',
            'link_list_title' => 'Zobacz:',
            'license' => 'Licencja',
            'terms' => 'Regulamin',
            'privacy_policy' => 'Polityka prywatności',
        ]
    ],
    'subscription' => [
        'checkout' => [
            'header' => 'Przejdź na wersję premium!'
        ]
    ],
    'recipes' => [
        'index' => [
            'header' => 'Przepisy',
            'name' => 'Nazwa',
            'recipe_items_count' => 'Składniki',
            'status' => 'Status',
            'actions' => 'Akcje',
            'add' => 'Dodaj nowy',
            'my_recipes' => 'Moje przepisy',
            'team_recipes' => 'Zespołowe przepisy',
            'public_recipes' => 'Publiczne przepisy',
        ],
        'create' => [
            'header' => 'Utwórz przepis',
            'name' => 'Nazwa przepisu',
            'description' => 'Opis',
            'image' => 'Zdjęcie',
            'items' => 'Składniki',
            'change_image' => 'Zmień zdjęcie'
        ],
        'edit' => [
            'header' => 'Edytuj przepis:',
            'edit_form' => 'Edytuj pola przepisu',
            'add_products' => 'Dodaj składniki',
            'preview' => 'Podgląd',
            'share_to_public' => 'Udostępnij publicznie',
            'share_to_team' => 'Udostępnij w zespole',
            'unshare_to_public' => 'Udostępniono publicznie',
            'unshare_to_team' => 'Udostępniono w zespole',
            'no_product_on_list' => 'Nie ma Twojego produktu? Dodaj go: ',
            'items' => 'Składniki',
            'add_ingredient' => 'Dodaj składnik, jeśli nie ma go na liście',
        ],
        'show' => [
            'header' => 'Przepis: ',
            'list' => 'Lista składników'
        ]
    ],
    'admin_panel' => [
        'header' => 'Panel administracyjny',
        'premium_users' => 'Subskrybenci',
        'free_users' => 'Konta free',
        'name' => 'Nazwa klienta',
        'email' => 'Email',
        'status' => 'Status',
        'enabled' => 'Włączony',
        'disabled' => 'Wyłączony',
        'amount_referrals' => 'Liczba poleconych',
        'manual_disabled' => 'Manualne wyłączenie',
        'turn_on' => 'Włącz',
        'turn_off' => 'Wyłącz',
    ],
    'user_panel' => [
        'header' => 'Panel użytkownika',
        'next_subscription' => 'Termin zapłaty za kolejny okres subskrypcji: ',
        'affiliate_saldo' => 'Saldo programu partnerskiego',
        'messages' => 'Wiadomości',
        'referral_link' => 'Twój link referencyjny: ',
        'username' => 'Nazwa użytkownika: ',
        'status' => 'Status konta: ',
        'earned' => 'Do tej pory zarobiłeś z nami: ',
        'amount_affiliates' => 'Twoi aktywni poleceni: ',
        'enabled' => 'Włączone',
        'disabled' => 'Wyłączone',
    ]
];
