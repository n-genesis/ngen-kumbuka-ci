# Project To-Do ListZ
This document just lists current tasks and planned features for the project. A more [Detailed Google Doc Here](https://docs.google.com/document/d/1-cpAjEaZSQvS6A5ZcgJN0wKay-YI9Nf7xm1bFfvkC3s/edit?usp=sharing), for more insign for future planes for the project. 

**Current Version (2.5.0-alpha)**

*After finishing the Following & Profile Visibility feature the next version with be v2.7.0-alpa*

#### *TODO: Need to show View Directory Template Structure*


## High Priority
- [ ] *TODO: Need to show View Directory Template Structure*

- [ ] Pinpoint why AJAX Reuqest are sooooo slow.
- [ ] FIX forced email activation on Admin Created or modify user accounts.

- [ ] Update User Registration to include more user details and store them in `user_details` table
- [ ] Update User Login to fetch more user details from `user_details` table  
- [ ] Add empty `user_details` for email activated Users
    *Unsure what I meant by this*

- [ ] **Need to create cover image upload** (*Starting to get profiles confused*)
- [ ] **Complete Notification mechanics**
- [ ] Create User Notification section and mechanics
    - [ ] Show only the last 5 User notifications for Toates and Notification dropdown

- [ ]

- [ ] *TODO: Add Role-Based Access Controles* for admin and user operations.

- [x] Complete User Privacy Setting
    - [ ] Private Account
    - [ ] Show Activity Status  
        - Show and Active badge next to the user Avatar picture



### High Priority: Currently Completing
- [x] **User Account Details Section**
    - [x] User details, account & privacy settings, and mail notifications settings

- [x] **Need to update AJAX request to include name="X-CSRF-TOKEN" in post requests**
- [x] **Add Native browser notification windows and User permission**

- [x] Create profile visibility feature/settings
    - [x] Need to create user follower mechanic for only friends profile visibilty

- [x] **Add User Follower function and mechanics**
    - [x] Create FollowerList Cell and User Follower/Follwing managment functions

- [x] **Add Events for New following Users**  
    - It's propably a good idea to incorperate throttling (no. of events recorded at once)

- [x] User Note Section and functions

- [x] Finish UserActivitySeeder Script


### High Priority: Completed
- [x] Extend shield's User Model to include more user details (first_name, last_name, full_name)
- [x] Add dismiss button to Notification elements
- [x] Admin Section for User managment


## Medium Priority
- [ ] Edit Admin Seeder file to remove redundant code

- [ ] Create `Cell` Views for sidebar menus
- [ ] Create `Cell` views for User Dashboard page
- [ ] Create `Cell` views for User Notifications and Messages
    - **Action Items:**
        - [ ] Create User Avatar and cover images uploads

-[ ] Add User Support Form and maybe Chat

### Medium Priority: Currently Completing
- [x] Add Admin opts for editing website settings (Admin Section)

### Medium Priority: Completed


## Low Priority
- [ ] Update template for Bootstrap 5 (legacy 4.6.2 used)
- [ ] Change theme to blue and visuals to match the name (just a thought)
- [ ] Update tabple to use Bootstrap 5
    - *Might just redesignthe template from scratch using Bootstrap 5*
- [ ] Create simple email templates for user actions (registration, password reset, etc.)
- [ ] Add Pagination/Pager language file
- [ ] Add Sheild OAuth Login

    - **Action Items:**
        - [ ] 


### Low Priority: Completed
- [ ]

### Low Priority: Currently Completing
- [ ]


## Completed Tasks
- [ ]


## Future Ideas
- [ ] Dashboard Layout Settings (User change Home Page/Dashboard View)