# Project 2.x.x-alpa - Development Notes
Well this was terribly overdue and done terribly, but hey it's done. So, here are some notes about the 2.0.0-alpha release. It's strutured much better from bootsnippets 1.x releases using CodeIgniter 4 and Shield. Still need to extend sheilds user model to include more user details and custom data.

For more information about current development and furture feature make sure to check out [TODO.md](./TODO.md).

### Curret Features (2.2.0-alpa)  
*Minor feature of older versions are listed underneath the primary one below.*
- Admin
  - CRUD User accounts
    - Add New User Accounts
    - Edit Excisting User; username, email, or password.
    - Ban or Unban a User with a message to show when a banned User attempts to login
    - Delete an exsiting User
- User (All operation are avaiable to admin users)
  - CRUD Notes Post
  - CRUD Notebooks
    - Share Notebooks with other Users
      All the user to give permission to other User to post notes in a user created Notbook
  - Follower and Following Users
    Users can follow other application User that allow followers  
    *Users can approve, deny or ban following Users*
  - Set User Profile Visibilty  
    The User can change thier profile visibility to `public`, `public`, or `friends`.
      - `friends` setting allows only apprved followers access to the User Profile.  


#### Upgraded
Added a custom Server name for project for localhost. Will include enviroment setup steps and what not later.

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
  - [x] Extending User Details w/ Shield. (**We're good to go for that!**)

### Features - Implementation Details
This section outlines the key design decisions and implementation notes for current features and implementation.
