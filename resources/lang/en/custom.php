<?php

return [
    'global' => [
        'nothing_to_show' => 'Nothing to show',
        'edit' => 'Edit',
        'choose' => 'Choose',
        'save' => 'Save',
        'messages' => [
            'successfully_save' => 'Successfully saved',
            'successfully_delete' => 'Successfully deleted',
            'successfully_restore' => 'Successfully restored',
            'dont_have_permission' => 'You don\'t have permission to this action',
            'dont_have_permission_message' => 'You are trying to perform an action for which you are not authorized',
            'not_found' => 'Not found',
            'server_error' => 'Server error'
        ],
        'roles' => [
            'admin_role_name' => 'Administrator',
            'admin_role_description' => 'The administrator can perform any action on the team',
            'member_role_name' => 'Team member',
            'member_role_description' => 'Member may only read, create, edit buy-in lists and items, not delete them',
        ],
        'dashboard' => 'dashboard',
        'register' => 'Register',
        'login' => 'Log in'
    ],
    'nav' => [
        'dashboard' => 'dashboard',
        'shopping_lists' => 'Shopping lists',
        'create_weekly_list' => 'Create weekly list!',
        'weekly_list' => 'Your weekly list',
        'change_language' => 'Change language',
        'polish' => 'Polish',
        'english' => 'English'
    ],
    'teams' => [
        'team_member_manager_email' => 'Enter the email address of the person you want to add to this team. You will have equal access to the shopping lists on the team.'
    ],
    'shopping_lists' => [
        'global' => [
            'shopping_date' => 'Planned date of shopping',
            'qty' => 'qty.',
            'g' => 'g', //gram
            'ml' => 'ml',
        ],
        'index' => [
            'header' => 'Your shopping lists',
            'title' => 'List name',
        ],
        'create' => [
            'header' => 'Add a shopping list on team:',
            'title' => 'List name',
            'shopping_date' => 'Planned date of shopping',
        ],
        'edit' => [
            'header' => 'Edit shopping list',
            'title' => 'List name',
            'shopping_date' => 'Planned date of shopping',
        ],
        'show' => [
            'header' => 'Shopping List',
            'shopping_date' => 'Planned date of shopping',
            'add_position' => 'Add position',
            'amount' => 'Amount',
            'type' => 'Type',
            'type_placeholder' => 'Select quantity, volume or weight',
        ],
        'weekly_list' => [
            'create' => [
                'header' => 'Create your weekly list',
                'button' => 'Generate',
                'start_date' => 'Start date',
                'end_date' => 'End date',
            ],
            'show' => [
                'header' => 'Weekly list',
            ],
        ],
    ],
    'positions' => [
        'edit' => [
            'header' => 'Edit position',
            'product' => 'Product name',
        ]
    ],
    'home_page' => [
        'nav' => [
            'instruction' => 'Instruction'
        ],
        'header' => [
            'bold_text' => 'Shopping with us is an adventure',
            'subtitle' => 'An application for sharing shopping lists with family members and generating collective lists - e.g. from the week'
        ],
        'first_section' => [
            'first_card' => [
                'title' => 'Together with family',
                'subtitle' => 'You can share your shopping lists with family members with one click!'
            ],
            'second_card' => [
                'title' => 'Shopping for a week',
                'subtitle' => 'Are you shopping for a week? Generate a summary list!'
            ],
            'third_card' => [
                'title' => 'Free*',
                'subtitle' => 'Use for free in the beta phase!'
            ],
            'title' => 'We know how important organization is!',
            'text' => 'With us, you can organize your home shopping with ease!',
            'text2' => 'Soon we will add built-in recipes for dishes, thanks to which you can import recipe products to your shopping list with one click!',
            'card_title' => 'We are constantly developing',
            'card_text' => 'We are working all the time to make the application better and better!'
        ],
        'second_section' => [
            'title' => 'Soon...',
            'text' => 'Recipes for tons of meals available! Surprise your family with a wonderful lunch or a romantic dinner for your partner!',
            'first_li' => 'Meal recipes',
            'second_li' => 'Available immediately!',
            'third_li' => 'Ability to add your own recipes!',
        ],
        'footer' => [
            'title' => 'Stay in touch!',
            'subtitle' => 'Stay in touch!',
            'link_list_title' => 'Look:',
            'license' => 'License',
            'terms' => 'Terms',
            'privacy_policy' => 'Privacy policy',
        ]
    ]
];
