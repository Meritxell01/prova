<?php

$config = array(
    'mcb_menu'  =>  array(
        'dashboard' =>  array(
            'title' =>  'dashboard',
            'href'  =>  'dashboard'
        ),
        'clients'   =>  array(
            'title'     =>  'clients',
            'href'      =>  'clients/index',
            'submenu'   =>  array(
                'clients'  =>  array(
                    'title' =>  'view_clients',
                    'href'  =>  'clients/index'
                ),
                'clients/form'   =>  array(
                    'title' =>  'add_client',
                    'href'  =>  'clients/form'
                )
            )
        ),
        /*Exemple de ficar un submenu com a menu
		'actions'  =>  array(
            'title'     =>  'actions',
            'href'      =>  'invoices/index'
		
		),
		*/
		
		
        'invoices'  =>  array(
            'title'     =>  'invoices',
            'href'      =>  'invoices/index',
            
           
            'submenu'   =>  array(
			    /*SUBMENU PRESSUPOST*/
                'quotes'  =>  array(
                    'title'     =>  'quotes',
                    'href'      =>  'invoices/index/is_quote/1',
                    'submenu'   =>  array(
                        'invoices/create/quote'    =>  array(
                            'title' =>  'create_quote',
                            'href'  =>  'invoices/create/quote/1'
                        ),
                        'invoices/index/is_quote/1' =>  array(
                            'title' =>  'view_quotes',
                            'href'  =>  'invoices/index/is_quote/1'
                        )
                    )
                ),
				 /*SUBMENU ALBARÀ*/
				 'albara'  =>  array(
                    'title'     =>  'delivery_note_number',
                    'href'      =>  'invoices/index/delivery_note_number/2',
                    'submenu'   =>  array(
                        'invoices/create/quote'    =>  array(
                            'title' =>  'create_delivery_note_number',
                            'href'  =>  'invoices/create/delivery_note_number/2'
                        ),
                        'invoices/index/is_quote/1' =>  array(
                            'title' =>  'view_delivery_note_number',
                            'href'  =>  'invoices/index/delivery_note_number/2'
                        )
                    )
                ),
                'payments'  =>  array(
                    'title'     =>  'payments',
                    'href'      =>  'payments/index',
                    'submenu'   =>  array(
                        'payments/index'    =>  array(
                            'title' =>  'view_payments',
                            'href'  =>  'payments/index'
                        ),
                        'payments/form' =>  array(
                            'title' =>  'enter_payment',
                            'href'  =>  'payments/form'
                        ),
                        'payments/payment_methods'  =>  array(
                            'title'         =>  'payment_methods',
                            'href'          =>  'payments/payment_methods',
                            'global_admin'  =>  TRUE
                        ),
                        'templates/index/type/payment_receipts' =>  array(
                            'title'         =>  'receipt_templates',
                            'href'          =>  'templates/index/type/payment_receipts',
                            'global_admin'  =>  TRUE
                        )
                    )
                ),
                'invoices/index'    =>  array(
                    'title' =>  'view_invoices',
                    'href'  =>  'invoices/index'
                ),
                'invoices/create'   =>  array(
                    'title' =>  'create_invoice',
                    'href'  =>  'invoices/create'
                ),

                'invoice_search'    =>  array(
                    'title' =>  'invoice_search',
                    'href'  =>  'invoice_search'
                ),
                'templates/index/type/invoices' =>  array(
                    'title'         =>  'invoice_templates',
                    'href'          =>  'templates/index/type/invoices',
                    'global_admin'  =>  TRUE
                )
            )
        ),
        'inventory' =>  array(
            'title'         =>  'inventory',
            'href'          =>  'inventory/index',
            'submenu'       =>  array(
                'inventory/index'   =>  array(
                    'title'         =>  'inventory_items',
                    'href'          =>  'inventory/index'
                ),
                'inventory/inventory_types' =>  array(
                    'title'         =>  'inventory_types',
                    'href'          =>  'inventory/inventory_types'
                ),
				'inventory/inventory_serials' =>  array(
                    'title'         =>  'inventory_serials',
                    'href'          =>  'inventory/inventory_serials'
                ) 
            )
        ),
        'reports'   =>  array(
            'title'         =>  'reports',
            'submenu'       =>  array(
                'balance'   =>  array(
                    'title' =>  'balance',
                    'href'  =>  'reports/balance'
                ),
                'balance_expenses'   =>  array(
                    'title' =>  'balance_expenses',
                    'href'  =>  'reports/balance/balance_expenses'
                ),
                'balance_invoices'   =>  array(
                    'title' =>  'balance_invoices',
                    'href'  =>  'reports/balance/balance_invoices'
                ),


                'accounting'  =>  array(
                    'title'     =>  'accounting',
                    'href'      =>  'reports/accounting_invoices',
                    'submenu'   =>  array(
                        'accounting/invoices'    =>  array(
                            'title' =>  'accounting_invoices',
                            'href'  =>  'reports/accounting_invoices'
                        ),
                        'accounting/invoices_bycategory' =>  array(
                            'title' =>  'accounting_invoices_bycategory',
                            'href'  =>  'reports/accounting_invoices_bycategory'
                        ),
                        'accounting/expenses'  =>  array(
                            'title'         =>  'accounting_expenses',
                            'href'          =>  'reports/accounting_expenses',
                            'global_admin'  =>  TRUE
                        ),
                        'accounting/expenses_bycategory' =>  array(
                            'title'         =>  'accounting_expenses_bycategory',
                            'href'          =>  'reports/accounting_expenses_bycategory',
                            'global_admin'  =>  TRUE
                        )
                    )
                ),    



                'client_list'   =>  array(
                    'title' =>  'client_list',
                    'href'  =>  'reports/client_list'
                ),
                'client_statement'  =>  array(
                    'title' =>  'client_statement',
                    'href'  =>  'reports/client_statement'
                ),
                'inventory_history' =>  array(
                    'title' =>  'inventory_history',
                    'href'  =>  'reports/inventory_history'
                ),
                'inventory_sales'   =>  array(
                    'title' =>  'inventory_sales',
                    'href'  =>  'reports/inventory_sales'
                )
            )
        ),
        'expenses'  => array(
            'title'     => 'expenses',
            'href'      => 'expenses/index',
            'submenu'   => array(
                    'expenses/index'  =>  array(
                    'title' =>  'view_expense',
                    'href'  =>  'expenses/index'
                    ),
                    'expenses/form'   =>  array(
                        'title' =>  'add_expense',
                        'href'  =>  'expenses/form'
                    ),
                    'expenses/category' => array(
                        'title' => 'view_category',
                        'href'  => 'expenses/category'
                    ),
                    'expenses/providers' => array(
                        'title' => 'view_provider',
                        'href'  => 'expenses/provider'
                    ),
                    'expenses/bank' => array(
                        'title' => 'view_banks',
                        'href'  => 'expenses/bank'
                    ),
                    'expenses/expense_payment_type' => array(
                        'title' => 'view_payment_type',
                        'href'  => 'expenses/expense_payment_type'
                    )
            )
        ),
        'system'    =>  array(
            'title'         =>  'system',
            'href'          =>  'settings',
            'global_admin'  =>  TRUE,
            'submenu'       =>  array(
                'client_center' =>  array(
                    'title'         =>  'client_center',
                    'href'          =>  'client_center/admin',
                    'global_admin'  =>  TRUE
                ),
                'mcb_modules'   =>  array(
                    'title'         =>  'custom_modules',
                    'href'          =>  'mcb_modules/index',
                    'global_admin'  =>  TRUE,
                ),
                'fields'    =>  array(
                    'title'         =>  'custom_fields',
                    'href'          =>  'fields/index',
                    'global_admin'  =>  TRUE,
                ),
                'invoices/invoice_groups'   =>  array(
                    'title'         =>  'invoice_groups',
                    'href'          =>  'invoices/invoice_groups'
                ),
                'invoice_statuses'  =>  array(
                    'title'         =>  'invoice_statuses',
                    'href'          =>  'invoice_statuses/index',
                    'global_admin'  =>  TRUE,
                ),
                'settings'  =>  array(
                    'title'         =>  'system_settings',
                    'href'          =>  'settings/index',
                    'global_admin'  =>  TRUE,
                ),
                'tax_rates' =>  array(
                    'title'         =>  'tax_rates',
                    'href'          =>  'tax_rates/index'
                ),
                'users' =>  array(
                    'title'         =>  'user_accounts',
                    'href'          =>  'users/index',
                    'global_admin'  =>  TRUE,
                )
            )
        )
    )
);

?>
