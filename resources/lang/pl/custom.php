<?php

return [
    'global' => [
        'nothing_to_show' => 'Nie ma nic do pokazania',
        'edit' => 'Edytuj',
        'choose' => 'Wybierz',
        'save' => 'Zapisz',
        'there' => 'TUTAJ',
        'messages' => [
            'successfully_save' => 'Poprawnie zapisano',
            'successfully_delete' => 'Poprawnie usunięto',
            'successfully_restore' => 'Poprawnie przywrócono',
            'successfully_purchase' => 'Płatność udana!',
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
        'dashboard' => 'Panel',
        'register' => 'Zarejestruj się',
        'login' => 'Zaloguj się',
        'subscription' => 'Subskrypcja',
    ],
    'nav' => [
        'dashboard' => 'Panel',
        'shopping_lists' => 'Listy zakupów',
        'create_weekly_list' => 'Na zakupy!',
        'weekly_list' => 'Lista tygodniowa',
        'recipes' => 'Przepisy',
        'change_language' => 'Zmień język',
        'polish' => 'Polski',
        'english' => 'Angielski'
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
        ],
        'show' => [
            'header' => 'Widok listy',
            'title' => 'Nazwa listy',
            'shopping_date' => 'Data zakupu',
            'add_position' => 'Dodaj pozycję',
            'amount' => 'Ilość',
            'type' => 'Typ',
            'type_placeholder' => 'Wybierz ilość, objętość lub waga',
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
            ],
        ],
    ],
    'positions' => [
        'edit' => [
            'header' => 'Edytuj pozycję',
            'product' => 'Nazwa produktu',
        ]
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
        ],
        'create' => [
            'header' => 'Utwórz przepis',
            'name' => 'Nazwa przepisu',
            'description' => 'Opis',
            'image' => 'Zdjęcie',
            'items' => 'Składniki',
            'change_image' => 'Zmień zdjęcie'
        ],
        'show' => [
            'header' => 'Przepis: ',
            'no_product_on_list' => 'Nie ma twojego produktu na liście? Dodaj go: ',
            'list' => 'Lista składników'
        ]
    ]
];
