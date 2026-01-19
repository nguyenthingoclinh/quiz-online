### Installation (using docker)
- Step 0: Copy code vào thư mục xampp/htdocs

- Step 1: Run command line to install vendor
```bash
    composer install
```
- Step 2: Create file `.env` for API, refer `.env.example`
```bash
     cp .env.example .env
```
- Step 3: Run command line to generate key
```bash
    php artisan key:generate
```
- Step 4: Run command line to run migrate to create DB
```bash
    php artisan migrate --force
```
- Step 5: Run command line to add default DB
```bash
    php artisan db:seed
```
- Step 6: Run command line to add storage link
```bash
    php artisan storage:link
```
- Step 7: Run command line to install npm dependencies
```bash
    npm install
```
- Step 8: Run command line to npm
```bash
    npm run dev
```

- Step 9: Open a new terminal and run the following command.
```bash
    php artisan serve
```

##### Hoàn thành, website sẽ chạy trên `http://localhost/quiz-online/public`
