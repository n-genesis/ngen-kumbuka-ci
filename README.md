# Kumbuka: Notebook Application
Kumbuka (Swahili: 'to take note' or 'to remember') is a web-based shared notebook application built with CodeIgniter 4.

**Version:** 1.0.0 alpha

![Dashboard](https://lh3.googleusercontent.com/d/1TsIHuLjOead--_CsQHjvznmpfXXXXUe9)

***Check Out:*** The project's [TODO.md list](./TODO.md) and [dev-notes file](./dev-notes.md) to see changelogs and planned updates and additions. [Here's a Google Doc]( https://docs.google.com/document/d/1-cpAjEaZSQvS6A5ZcgJN0wKay-YI9Nf7xm1bFfvkC3s/edit?usp=sharing) with some applications development plans. 


## Build w/ CodeIgniter 4
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

Run `composer install` whenever there is a new release of the framework.

**Important**: When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from `vendor/codeigniter4/framework/app`.


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
8. Alternatively, you can browse the app using a web browser, by entering this URL address `http://localhost:8080` or the App URL used in `app.baseURL`.