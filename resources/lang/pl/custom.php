<?php

return [
    'global' => [
        'nothing_to_show' => 'Nie ma nic do pokazania',
        'edit' => 'Edytuj',
        'choose' => 'Wybierz',
        'save' => 'Zapisz',
        'messages' => [
            'successfully_save' => 'Poprawnie zapisano',
            'successfully_delete' => 'Poprawnie usunięto',
            'successfully_restore' => 'Poprawnie przywrócono',
            'dont_have_permission' => 'Nie masz uprawnień do tej akcji'
        ],
        'roles' => [
            'admin_role_name' => 'Administrator',
            'admin_role_description' => 'Administrator może wykonać dowolną akcję w zespole',
            'member_role_name' => 'Członek zespołu',
            'member_role_description' => 'Członek może tylko czytać, tworzyć, edytować listy zkupów i pozycje, nie może ich usuwać',
        ],
        'dashboard' => 'Panel',
        'register' => 'Zarejestruj się',
        'login' => 'Zaloguj się'
    ],
    'teams' => [
        'team_member_manager_email' => 'Podaj adres email osoby, którą chcesz dodać do tego zespołu. Będziecie mieć równy dostep do list zakupów w zespole.'
    ],
  'shopping-lists' => [
      'global' => [
          'shopping_date' => 'Data zakupu'
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
          'qty' => 'szt.',
          'g' => 'g', //gram
          'ml' => 'ml',
      ],
      'weekly_list' => [
          'header' => 'Lista zbiorcza',
          'subheader' => 'Generuj listę zbiorczą',
          'button' => 'Generuj'
      ],
  ],
    'positions' => [
        'edit' => [
            'header' => 'Edytuj pozycję',
            'product' => 'Nazwa produktu',
            'quantity' => 'Ilość',
            'weight' => 'Waga',
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
              'title' => 'Zero opłat',
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
  ]
];
