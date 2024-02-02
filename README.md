## Installation Steps:

1. **Clone Repository**

    ```bash
    git clone https://github.com/fauzanlnh/memento-mori.git
    cd memento-mori
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

    or

    ```bash
    composer update
    ```

3. **Setup or Create File .env**

    ```bash
    cp .env.example .env
    ```

4. **Generate APP_KEY in file .env**

    ```bash
    php artisan key:generate
    ```

5. **Create Database**

    Set up a database for the application.

6. **Migrate & Seed Database**

    ```bash
    php artisan migrate --seed
    ```

7. **Run Local Server**
    ```bash
    php artisan serve
    ```
    Access the web application at http://localhost:8000.
