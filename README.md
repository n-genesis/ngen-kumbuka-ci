# Kumbuka: Notebook Application
Kumbuka (Swahili: 'to take note' or 'to remember') is a simple notebook application built with CodeIgniter 4.


![Version](https://img.shields.io/badge/version-v2.5.0--alpa-blue?style=for-the-badge)
![Static Badge](https://img.shields.io/badge/Status-Active-red?style=for-the-badge)
[![Static Badge](https://img.shields.io/badge/Copyright%20%C2%A9%202026%20N--Gen%20Design-1E30F3?style=for-the-badge&label=Copyright)](https://ngendesign.com)


### Tech Stack
![Static Badge](https://img.shields.io/badge/PHP-8.5.1-474A8A?style=for-the-badge)
![Static Badge](https://img.shields.io/badge/MariaDB-10.4.32-C0765A?style=for-the-badge&labelColor=1F305F)
![Static Badge](https://img.shields.io/badge/Apache-2.4.58-A22160?style=for-the-badge&labelColor=F69824)
![Static Badge](https://img.shields.io/badge/OpenSSL-3.1.3-721412?style=for-the-badge)


![Static Badge](https://img.shields.io/badge/CodeIgniter-4.6.4-DD4814?style=for-the-badge)
![Static Badge](https://img.shields.io/badge/Bootstrap-4.6.2-6f42c1?style=for-the-badge)


### [Kumbuka](https://kumbuka.ngendesign.com) is a project developed with love & fun by [N-Gen Design](https://ngendesign.com).


![Dashboard](https://lh3.googleusercontent.com/d/1aY5_KtxUvK1aBTipXSJIDU-aIZj9tVNd)

***Check Out:*** The project's [TODO.md list](./TODO.md) and [dev-notes file](./dev-notes.md) to see changelogs and planned updates and additions. [Here's a Google Doc]( https://docs.google.com/document/d/1-cpAjEaZSQvS6A5ZcgJN0wKay-YI9Nf7xm1bFfvkC3s/edit?usp=sharing) with some applications development plans. 


### Updates
#### 2.5.0-alpa  
These are some of the updates made from the last update
- Added Profile visibility controls


## Build w/ CodeIgniter 4.x
CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure. More information can be found at the [official site](https://codeigniter.com).

You can read the [user guide](https://codeigniter.com/user_guide/) corresponding to the latest version of the framework.

### Included Packages & Libraries
- CodeIgniter 4 User Guide: https://codeigniter.com/user_guide/index.html
- Shield Documentation: https://shield.codeigniter.com
- Starter CI4 App: https://github.com/ilhamlutfi/starter-ci4
- CI4 Shield Starter: https://github.com/SdVVentures/ci4-shield-starter
- Tatter\Preferences: https://github.com/tattersoftware/codeigniter4-preferences


## Getting started

***Required***: This repository holds a composer-installable app starter.
It has been built from the [development repository](https://github.com/codeigniter4/CodeIgniter4) and [Sheild](https://shield.codeigniter.com/)  - The official authentication and authorization framework for CodeIgniter 4 

```
root/
├── app/                # Application logic (Namespaced: App)
│   ├── Config/         # Configuration files (Database, Routes, etc.)
│   ├── Controllers/    # Application controllers
│   ├── Database/       # Migrations and Seeds
│   ├── Filters/        # Controller filters (Before/After classes)
│   ├── Helpers/        # Custom helper functions
│   ├── Models/         # Database models
│   └── Views/          # UI templates (HTML/PHP)
├── public/             # Web Root (accessible via browser)
│   ├── assets/         # CSS, JS, and Images
│   ├── .htaccess       # Apache configuration
│   └── index.php       # Framework entry point
├── tests/              # PHPUnit test files
├── writable/           # Dynamic content (Cache, Logs, Session, Uploads)
├── vendor/             # Composer dependencies (inc. system/ core)
├── .env                # Environment-specific configuration
├── composer.json       # Dependency manifest
├── phpunit.xml.dist    # Testing configuration
├── README.md           # Project documentation
└── spark               # CLI tool for CodeIgniter commands

```

Run `composer install` whenever there is a new release of the framework.

**Important**: When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from `vendor/codeigniter4/framework/app`.


## **Need to update setup steps**

### Setup Localhost
1. Download or clone the repo to your `localhost` folder.
2. Change directory to `cd ngen-kumbuka-ci` folder.
3. Import `ngen-bootsnippets-ci/database.sql` to your MySQL or MariaDB Server, create a user and grant all rights to the imported `DB`
4. Rename `env` to `.env`
5. (Optional) Change the App URL to `app.baseURL = 'http://localhost/ngen-kumbuka-ci/public/'` if nedded.
6. Update database config, change the lines where `database.default.database =`, `database.default.username =`, `database.default.password =`, and `database.default.hostname =` in .env file to match your database credentials.
7. Run the Migrates: `php spark migrate --all`.
8. Launch the development server (Two options)
    1. Run `php spark serve` to launch a built-in development server.
    2. Or if using VS Code Tasks
        1. **Open the Command Palette**: Press `Ctrl+Shift+P` (Windows/Linux) or `Cmd+Shift+P` (macOS).
        2. **Type "run task"**: Start typing `Tasks: Run Task` into the search bar and select it from the dropdown list.
        3. **Select the task**: A list of available tasks (auto-detected or those defined in your tasks.json file) will appear. Select `Run Compser Server (Kubmuka)` to the launch a built-in development server the integrated terminal.
9. Alternatively, you can browse the app using a web browser, by entering this URL address `http://localhost:8080` or the App URL used in `app.baseURL`.

## Server Requirements

PHP version 8.5 or higher is required, with the following extensions installed:
- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


## Credits

Got the be grateful for these projects and creators that shared them. They've help in The Bootsnippets.com projects development. Much thanks.

#### Tatter\Preferences:
Persistent user-specific settings for CodeIgniter 4
https://github.com/tattersoftware/codeigniter4-preferences

## License
"Copyright (c) 2026 N-Gen Design. All rights reserved. No license is granted for use, modification, or distribution".