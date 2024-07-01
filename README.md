# Laravel Blog Application

This is a simple blog application built using Laravel, featuring user authentication, CRUD operations for blog posts, and commenting functionality.

## Features

- **User Authentication:**
  - User registration and login using Laravel's built-in authentication.
  - Authentication middleware to protect routes for creating, editing, and deleting posts.

- **Blog Posts:**
  - Create, edit, and delete blog posts.
  - Each post includes a title, body, author information, and timestamps.
  - Input validation ensures required fields are filled and titles are unique.

- **Comments:**
  - Authenticated users can comment on blog posts.
  - Each comment includes the comment body, author information, and timestamp.
  - Comment validation ensures the body is required.

- **Post Listing:**
  - Homepage displays a paginated list of all blog posts.
  - Each post shows the title, author, and a snippet of the body content.

- **Post Details:**
  - Clicking on a post title displays the full content of the post.
  - Comments associated with the post are displayed below the post content.

- **Unit Testing:**
  - Includes PHPUnit tests to ensure functionality correctness.
  - Tests cover creating posts and adding comments.

## Installation

1. **Clone the repository:**

   ```bash
   git clone git@github.com:OjerIsaac/laravel-blog.git
   cd laravel-blog
   ```

2. **Install dependencies:**

   ```bash
   composer install
   npm install
   ```

3. **Set up environment variables:**

   - Rename `.env.example` to `.env` and configure your database credentials.

4. **Run migrations:**

   ```bash
   php artisan migrate
   ```

5. **Serve the application:**

   ```bash
   npm start
   ```

   Access the application at `http://localhost:8000`.

## Usage

- **Register/Login:**
  - Use the registration link to create a new account.
  - Log in with your credentials to access the blog features.

- **Create a Post:**
  - Click on "Create New Post" to write a new blog post.
  - Fill in the title and body fields, then click "Submit" to create the post.

- **Edit/Delete a Post:**
  - Navigate to a post and click on "Edit" to modify the post content.
  - Click "Delete" to remove the post permanently.

- **Add a Comment:**
  - Scroll to the bottom of a post and use the comment form to add a new comment.
  - Enter your comment text and click "Submit" to post it.

- **Unit Testing:**
  - To run the PHPUnit tests:

  ```bash
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    ```

  - to clear the cache then run:

   ```bash
   php artisan test
   ```

## Contributing

Contributions are welcome! If you have suggestions for improvements or find any issues, please submit an issue or a pull request.