# Project 2.0.0-alpa - Development Notes
Well this was terribly overdue and done terribly, but hey it's done. So, here are some notes about the 2.0.0-alpha release. It's strutured much better from bootsnippets 1.x releases using CodeIgniter 4 and Shield. Still need to extend sheilds user model to include more user details and custom data.

### Curret Features
- Admin
  - CRUD User accounts
    - Ban user accounts
- User (All operation are avaiable to admin users)
  - CRUD Notes Post
  - CRUD Notebooks
    - Share Notebooks with other Users
      All the user to give permission to other User to post notes in a user created Notbook
  - Follower and Following Users
    User can follow other application User that allow followers
    *User and aprove, deny or ban followers*


#### Upgraded
Added a custom Server name for project for localhost. Will include enviroment setup steps and what not later.

#### ~~Project 1.1.0 Beta - Development Notes~~
Finished; breaking changes

### YYYY_MM_DD - Daily Quip

- **Key Updates:**
  - [x] Restructure directory to resemble the M-V-C architecture.
  - [x] Started User BackEnd sections 
  - [x] Create profile visibility feature
  
- **Action Items:**
  - [x] Need to delete empty directories (they're confusing).

- **Action Items:**
    - [x] Finish User authentication system w/ Shield.
    - [x] Add `user_details` table to store more user info 

- **Action Items:**
  - [x] Extending User Details w/ Shield .

### Features - Implementation Details
This section outlines the key design decisions and implementation notes for current features and implementation.

#### CustomEditor WYSIWYG
This project use a custom/forked project for a Bootstrap 5 JavaScript/jQuery extension WYSIWYG. Will include implementation directions at a later time.