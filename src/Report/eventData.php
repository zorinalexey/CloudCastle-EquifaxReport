<?php
return [
    '1.1' => [
        'information_part' => [
            'application'
        ]
    ],
    '1.2' => [
        'information_part' => [
            'application'
        ]
    ],
    '1.3' => [
        'information_part' => [
            'application',
            'failure'
        ]
    ],
    '1.4' => [
        'base_part' => [
            'addr_reg',
            'addr_fact',
            'contacts',
            'ogrnip',
            'incapacity',
            'contract' => [
                'uid',
                'deal',
                'contract_amount',
                'joint_debtors',
                'payment_terms',
                'full_cost',
            ]
        ],
        'add_part' => [
            'accounting'
        ],
        'information_part' => [
            'application',
        ]
    ],
    '1.4.1' => [
        'base_part' => [
            'addr_reg',
            'addr_fact',
            'contacts',
            'ogrnip',
            'incapacity',
            'contract' => [
                'uid',
                'deal',
                'contract_amount',
                'joint_debtors',
                'payment_terms',
                'cred_start_debt',
                'debt',
                'debt_current',
                'debt_overdue',
                'payments',
                'material_guarantee_source'
            ]
        ],
        'add_part' => [
            'accounting'
        ],
        'information_part' => [
            'application',
            'credit'
        ]
    ],
    '1.5' => [
        'base_part' => [
            'addr_reg',
            'addr_fact',
            'contacts',
            'ogrnip',
            'incapacity',
            'contract' => [
                'collection'
            ]
        ],
        'information_part' => [
            'credit'
        ]
    ],
    '1.6' => [
        'base_part' => [
            'contract' => [
                'collection'
            ]
        ],
        'information_part' => [
            'credit'
        ]
    ],
    '1.7' => [

    ],
    '1.9' => [
        'base_part' => [
            'addr_reg',
            'addr_fact',
            'contacts',
            'ogrnip'
        ]
    ],
    '1.10' => [
        'base_part' => [
            'incapacity',
        ]
    ],
    '1.12' => [
        'base_part' => [
            'bankruptcy',
            'bankruptcy_finish'
        ]
    ],
    '2.1' => [
        'base_part' => [
            'contract' => [
                'uid',
                'deal',
                'contract_amount',
                'joint_debtors',
                'payment_terms',
                'full_cost',
                'contract_changes',
                'cred_start_debt',
                'debt',
                'debt_current',
                'debt_overdue',
                'payments',
                'average_payment',
                'material_guarantee_subject'
            ]
        ],
        'add_part' => [
            'accounting',
        ]
    ],
    '2.2' => [
        'base_part' => [
            'contract' => [
                'uid',
                'deal',
                'contract_amount',
                'payment_terms',
                'full_cost',
                'cred_start_debt',
                'debt',
                'debt_current',
                'debt_overdue',
                'payments',
                'average_payment',
                'material_guarantee_source',
            ]
        ],
        'information_part' => [
            'credit'
        ]
    ],
    '2.3' => [
        'base_part' => [
            'contract' => [
                'uid',
                'deal',
                'contract_amount',
                'payment_terms',
                'full_cost',
                'cred_start_debt',
                'debt',
                'debt_current',
                'debt_overdue',
                'payments',
                'average_payment',
                'material_guarantee_subject',
            ]
        ],
        'add_part' => [
            'accounting'
        ],
        'information_part' => [
            'credit'
        ]
    ],
    '2.4' => [
        'base_part' => [
            'contract' => [
                'uid',
                'collaterals' => [
                    'collateral'
                ],
                'guarantees' => [
                    'guarantee'
                ],
                'indie_guarantees' => [
                    'indie_guarantee'
                ],
                'collateral_insce',
                'repayment_collateral',
                'guarantee_return'
            ]
        ]
    ],
    '2.5' => [
        'base_part' => [
            'contract' => [
                'uid',
                'deal',
                'contract_amount',
                'payment_terms',
                'full_cost',
                'cred_start_debt',
                'debt',
                'debt_current',
                'debt_overdue',
                'payments',
                'average_payment',
                'material_guarantee_subject',
                'contract_end',
            ]
        ],
        'information_part' => [
            'credit'
        ]
    ],
    '2.6' => [
        'base_part' => [
            'contract' => [
                'uid',
                'court'
            ]
        ],
    ],
    '2.8.1' => [],
    '2.8.2' => [],
    '2.8.3' => [],
    '2.9.1' => [],
    '2.9.2' => [],
    '2.9.3' => [],
    '2.10' => [
        'base_part' => [
            'contract' => [
                'uid',
                'stop_load'
            ]
        ],
    ],
    '2.11' => [
        'base_part' => [
            'contract' => [
                'uid',
                'stop_load'
            ]
        ],
        'add_part' => [
            'purchaser'
        ],
    ],
    '2.12' => [
        'base_part' => [
            'contract' => [
                'uid'
            ]
        ],
        'add_part' => [
            'service_organization',
            'accounting'
        ],
    ]
];