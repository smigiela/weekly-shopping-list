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
            'dont_have_permission' => 'Nie masz uprawnień do tej akcji'
        ],
        'roles' => [
            'admin_role_name' => 'Administrator',
            'admin_role_description' => 'Administrator może wykonać dowolną akcję w zespole',
            'member_role_name' => 'Członek zespołu',
            'member_role_description' => 'Członek może tylko czytać, tworzyć, edytować listy zkupów i pozycje, nie może ich usuwać',
        ]
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
          'type_placeholder' => 'Wybierz ilość lub waga',
          'qty' => 'szt.',
          'g' => 'g' //gram
      ],
  ],
    'positions' => [
        'edit' => [
            'header' => 'Edytuj pozycję',
            'product' => 'Nazwa produktu',
            'quantity' => 'Ilość',
            'weight' => 'Waga',
        ]
    ]
];
