Photos Android App - README
Project Information
Course: CS213 - Software Methodology
Assignment: Android Photos App
Team Members:

[Partner 1 Name] - [NetID]
[Partner 2 Name] - [NetID]


Project Description
Android application for managing photo albums with tagging and search functionality. Users can organize photos into albums, add person and location tags, and search photos using AND/OR logic with auto-completion.

Features
✅ Album Management

Create, rename, and delete albums
View all albums with photo counts
Data persists across app sessions

Screenshot:

[ADD SCREENSHOT: Home screen showing album list]
<img width="318" height="726" alt="Screenshot 2025-12-10 at 4 43 32 PM" src="https://github.com/user-attachments/assets/64a3fa6f-9686-4edf-ab70-981ac19208d8" />


✅ Photo Management

Add photos from device gallery
View photos in grid layout (2 columns)
Delete photos with confirmation
Move photos between albums
Manual slideshow with Previous/Next buttons

Screenshots:

[ADD SCREENSHOT: Album view with photo grid]


[ADD SCREENSHOT: Photo detail view with slideshow]


✅ Tag Management

Add tags with two types: Person and Location
Delete tags via dedicated button
View all tags for each photo
Tags persist with photos

Screenshot:

[ADD SCREENSHOT: Photo detail showing tags and tag buttons]


✅ Search Functionality

Search by person or location tags
AND logic: Find photos with both tags
OR logic: Find photos with either tag
Auto-completion suggestions
Case-insensitive substring matching
Search across all albums

Screenshots:

[ADD SCREENSHOT: Search interface with tag inputs]


[ADD SCREENSHOT: Search results grid]


Technical Details
Development Environment:

Language: Java
Min SDK: API 26 (Android 8.0)
Target SDK: API 36
IDE: Android Studio

Data Storage:

Java Serialization to internal storage
Persistent URI permissions for photos
Auto-save on app pause


How to Run

Clone the repository
Open in Android Studio
Sync Gradle files
Run on emulator (Pixel 6, API 36) or physical device
Grant storage permissions when prompted

