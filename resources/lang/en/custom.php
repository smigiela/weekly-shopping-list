<?php

return [
    'global' => [
        'nothing_to_show' => 'Nothing to show',
        'back' => 'Back',
        'edit' => 'Edit',
        'choose' => 'Choose',
        'save' => 'Save',
        'archive' => 'Archive',
        'permanently_delete' => 'Permanently delete!',
        'there' => 'THERE',
        'messages' => [
            'successfully_save' => 'Successfully saved',
            'successfully_delete' => 'Successfully deleted',
            'successfully_restore' => 'Successfully restored',
            'successfully_archived' => 'Archived successfully!',
            'successfully_purchase' => 'Payment successfully!',
            'successfully_favourite' => 'Added to favourites!',
            'successfully_remove_favourite' => 'Remove from favourites!',
            'dont_have_permission' => 'You don\'t have permission to this action',
            'dont_have_permission_message' => 'You are trying to perform an action for which you are not authorized',
            'dont_have_active_subscription' => 'You don\'n have a premium plan.',
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
        'login' => 'Log in',
        'subscription' => 'Subscription',
        'get_subscription' => 'Got to PREMIUM'
    ],
    'nav' => [
        'dashboard' => 'dashboard',
        'shopping_lists' => 'Shopping lists',
        'create_weekly_list' => 'Create weekly list!',
        'weekly_list' => 'Your weekly list',
        'recipes' => 'Recipes',
        'change_language' => 'Change language',
        'polish' => 'Polish',
        'english' => 'English',
        'fav_products' => 'Favourite products'
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
            'get_archived' => 'Archived lists'
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
            'add_positions' => 'Add positions',
        ],
        'restore' => [
            'header' => 'Restore shopping list - Enter a new shopping date',
            'shopping_date' => 'Shopping date',
        ],
        'show' => [
            'header' => 'Shopping List',
            'title' => 'Title',
            'shopping_date' => 'Planned date of shopping',
            'choose_product' => 'Choose product',
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
                'generate_pdf' => 'Wyświetl PDF'
            ],
            'pdf' => [
                'title' => 'Shopping list on date: ',
                'position_name' => 'Product name',
                'amount' => 'Amount',
            ],
        ],
        'archived_lists' => [
            'index' => [
                'header' => 'Archived lists',
                'restore' => 'Restore'
            ],
        ],
    ],
    'positions' => [
        'edit' => [
            'header' => 'Edit position',
            'product' => 'Product name',
        ]
    ],
    'products' => [
        'index' => [
            'header' => 'Products - add to favourites!'
        ],
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
    ],
    'subscription' => [
        'checkout' => [
            'header' => 'Go to PREMIUM!'
        ]
    ],
    'recipes' => [
        'index' => [
            'header' => 'Recipes',
            'name' => 'Name',
            'recipe_items_count' => 'Amount of items',
            'status' => 'Status',
            'actions' => 'Actions',
            'add' => 'Add new',
            'my_recipes' => 'My recipes',
            'team_recipes' => 'My team recipes',
            'public_recipes' => 'Public recipes',
        ],
        'create' => [
            'header' => 'Add recipe',
            'name' => 'Name product',
            'description' => 'Description',
            'image' => 'Image',
            'items' => 'Ingredients',
            'change_image' => 'Change image'
        ],
        'edit' => [
            'header' => 'Edit recipe:',
            'edit_form' => 'Edit the recipe fields',
            'add_products' => 'Add product',
            'preview' => 'Preview',
            'share_to_public' => 'Share public',
            'share_to_team' => 'Share in your current team',
            'unshare_to_public' => 'Shared public',
            'unshare_to_team' => 'Shared in your current team',
        ],
        'show' => [
            'header' => 'Recipe: ',
            'list' => 'Ingredients'
        ]
    ],
    'admin_panel' => [
        'header' => 'Admin dashboard'
    ],
    'user_panel' => [
        'header' => 'User dashboard'
    ]
];
