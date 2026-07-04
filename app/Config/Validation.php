<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];


    public array $nameRules = [
        'first_name' => [
            'label' => 'First Name',
            'rules' => 'required|alpha_space|min_length[2]|max_length[50]',
        ],
        'last_name' => [
            'label' => 'Last Name',
            'rules' => 'required|alpha_space|min_length[2]|max_length[50]',
        ],
        'bio' => [
            'label' => 'Bio',
            'rules' => 'permit_empty|min_length[25]|max_length[500]',
            'errors' => [
                'max_length' => 'The {field} cannot be longer than {param} characters.'
            ]
        ],
    ];

    public array $contactRules = [
        'organization' => [
            'label' => 'Company Name',
            'rules' => 'permit_empty|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s.,&\-\'\(\)]+$/]',
            'errors' => [
                'regex_match' => 'The {field} can only be letters, numbers, spaces, and basic punctuation (e.g., "A&B Labs, Inc.", "3M", or "Cross-Platform Co.")'
            ]

        ],
        'phone' => [
            'label' => 'Phone Number',
            'rules' => 'permit_empty|regex_match[/^(?:\([0-9]{3}\)\s?|[0-9]{3}[-.\s]?)[0-9]{3}[-.\s]?[0-9]{4}$/]',
            'errors' => [
                'regex_match' => 'The {field} field must be a valid phone number (e.g., (123) 456-7890 or 123-456-7890).'
            ]
        ],
        'city' => [
            'label' => 'City',
            'rules' => 'permit_empty|alpha_space|max_length[100]',
            'errors' => [
                'alpha_space' => 'The {field} field must only contain alphabetic characters and spaces.'
            ]
        ],
        'state' => [
            'label' => 'State',
            // Requires a 2-letter uppercase USPS abbreviation
            'rules' => 'permit_empty|exact_length[2]|alpha|regex_match[/^[A-Z]{2}$/]',
            'errors' => [
                'exact_length' => 'The {field} field must be exactly {param} characters long.',
                'alpha' => 'The {field} field must only contain letters.',
                'regex_match' => 'The {field} field must be in uppercase (e.g., PA).'
            ]
        ],
        'zip' => [
            'label' => 'ZIP Code',
            // Regex for 5-digit or 5+4 format (e.g., 12345 or 12345-6789)
            'rules' => 'permit_empty|regex_match[/^\\d{5}(-\\d{4})?$/]',
            'errors' => [
                'regex_match' => 'The {field} field must be a valid 5 or 9-digit ZIP code (e.g., 12345 or 12345-6789).'
            ]
        ],
    ];

    public $socialLinkRules = [
        'facebook' => [
            'label' => 'Facebook Link',
            'rules' => 'permit_empty|regex_match[/^https?:\/\/(www\.)?facebook\.com\/[a-zA-Z0-9.]+$/]',
            'errors' => [
                'regex_match' => 'Your {field} link must be a valid Facebook profile.'
            ]
        ],
        'twitter' => [
            'label' => 'X (Twitter) Link',
            'rules' => 'permit_empty|regex_match[/^https?:\/\/(www\.)?(twitter|x)\.com\/[a-zA-Z0-9_]{1,15}$/]',
            'errors' => [
                'regex_match' => 'Your {field} link must be a valid X (Twitter) profile.'
            ]
        ],
        'instagram' => [
            'label' => 'Instagram Link',
            'rules' => 'permit_empty|regex_match[/^https?:\/\/(www\.)?instagram\.com\/[a-zA-Z0-9_.]+(\/)?$/]',
            'errors' => [
                'regex_match' => 'Your {field} link must be a valid Instagram profile.'
            ]
        ],
        'snapchat' => [
            'label' => 'Snapchat Link',
            'rules' => 'permit_empty|regex_match[/^https?:\/\/(www\.)?snapchat\.com\/add\/[a-zA-Z0-9][a-zA-Z0-9-]{2,14}$/]',
            'errors' => [
                'regex_match' => 'The {field} must be a valid Snapchat profile link (e.g., https://snapchat.com).'
            ]
        ],
        'user_website' => [
            'lable' => 'Website',
            'rules' => 'permit_empty|valid_url_strict',
            'errors' => [
                'regex_match' => 'Please enter a valid website address (e.g., https://example.com).'
            ]
        ]
    ];
    
    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
