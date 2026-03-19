# Project 2.x.x-alpa - Development Notes
Here I describe and includenotes about the the development of the Kumbuka Project in addtions to furture plannes for for the project. It's strutured much better from bootsnippets 1.x releases using CodeIgniter 4 and Shield.

For more information about current development and furture feature make sure to check out [TODO.md](./TODO.md).

### *Need to Show View directory template stucture*  
*I get the feeling I'm going to start to get confuded after a while*  
The Home page & Quckpick Views use a combination of Views and Cells to dynamicly create the User Dashbaord page. This is done some a custom layout can be created by the User. I need to make sure to describe out these work together to prevent future consfusion.


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

### 2026-MARCH-15TH - Daily Quip
*After getting to a beta version of the project I should see if anyone will help be test Users? It's would be nice to have a project with active users, and activity so I can learn how to maintain a live CodeIgniter 4 project.*

- **Key Updates:**
  - [x] Restructure directory to resemble the M-V-C architecture.
  - [x] Started User BackEnd sections
  - [x] Creating User Follower & Following mechanics/features
  - [x] Create profile visibility feature
  
- **Action Items:**
  - [x] Need to delete empty directories (*done*).
  - [x] Need to finish User Account, Privacy, and Setting sections

- **Action Items:**
    - [x] Finish User authentication system w/ Shield. (**Done**)
    - [x] Add `user_details` table to store more user info (**Done**)

- **Action Items:**
  - [x] Extending User Details w/ Shield. (**We're good for that!**)

### Features - Implementation Details
This section outlines the key design decisions and implementation notes for current features and implementation.


