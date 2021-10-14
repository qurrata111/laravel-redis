# Laravel Project with Cache

## Database Design

The database is quite simple. It consists of three tables:
1. `authors` consists of two columns:
    - `id`
    - `name`
2. `books` consists of two columns:
    - `id`
    - `title`
3. `booksAuthor` is a table to store relationship between books and author. It consists of three columns:
    - `id`
    - `book_id`
    - `author_id`

Since each author has one or many books and each book can be written by one or multiple authors. So the relationship between books and authors is **many to many**

## How to run the project?
- Clone this repo
- configure the `.env`
- run this command `php artisan install`
- run `php artisan serve`
