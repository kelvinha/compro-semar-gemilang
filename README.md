# Company Profile CMS

A comprehensive Content Management System for company profiles, built with Laravel.

## Features

-   **User Role Management**: Superadmin and Admin roles with customizable permissions
-   **Website Settings**: Manage website name, logo, meta tags, and more
-   **Menu Management**: Create and manage menus and submenus
-   **Page Management**: Create and manage pages with dynamic sections
-   **Blog Module**: Create and manage blog posts with categories
-   **SEO Settings**: Optimize your website for search engines
-   **Media Management**: Upload and manage media files
-   **Responsive Design**: Mobile-friendly admin panel
-   **CKEditor Integration**: Rich text editing for content
-   **Customizable Colors**: Set primary and secondary colors for your website

## Requirements

-   PHP >= 8.1
-   MySQL >= 5.7
-   Composer
-   Node.js and NPM (for asset compilation)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/compro-cms.git
    cd compro-cms
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Copy the environment file:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Configure your database in the `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=compro_cms
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run the setup command:

    ```bash
    php artisan compro:setup --fresh
    ```

7. Start the development server:

    ```bash
    php artisan serve
    ```

8. Access the admin panel at `http://localhost:8000/admin`

## Default Credentials

-   **Superadmin**:

    -   Email: superadmin@example.com
    -   Password: password

-   **Admin**:
    -   Email: admin@example.com
    -   Password: password

## Usage

### Website Settings

1. Go to `Settings > Website Settings`
2. Configure your website name, logo, contact information, and more
3. Set your primary and secondary colors for the website

### Menu Management

1. Go to `Content Management > Menus`
2. Create a new menu (e.g., Main Menu, Footer Menu)
3. Add submenus to your menu
4. Configure the menu location and order

### Page Management

1. Go to `Content Management > Pages`
2. Create a new page
3. Add sections to your page
4. Configure SEO settings for the page

### Blog Management

1. Go to `Content Management > Blog > Categories`
2. Create blog categories
3. Go to `Content Management > Blog > All Posts`
4. Create blog posts
5. Configure SEO settings for each post

### User Management

1. Go to `Administration > Users`
2. Create and manage users
3. Assign roles to users

### Role Management

1. Go to `Administration > Roles`
2. Create and manage roles
3. Assign permissions to roles

## Customization

### Colors

You can customize the primary and secondary colors of your website in the Website Settings.

### Templates

The CMS uses Blade templates that you can customize:

-   Frontend templates: `resources/views/frontend/`
-   Admin templates: `resources/views/admin/`

### CSS and JavaScript

-   Custom CSS: `public/css/compro-cms-admin.css`
-   Custom JavaScript: `public/js/compro-cms-admin.js`

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Credits

-   [Laravel](https://laravel.com/)
-   [Bootstrap](https://getbootstrap.com/)
-   [CKEditor](https://ckeditor.com/)
-   [Toastr](https://github.com/CodeSeven/toastr)
