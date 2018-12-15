## Instalasi

1. copy .env.example jadi .env
2. kemudian edit filenya
3. Sesuaikan parameter DB_*
4. QUEUE_CONNECTION di isi database (QUEUE_CONNECTION=database)
5. eksekusi "php artisan migrate --seed"

## Cara Menggunakan

1. eksekusi "php artisan serve"
2. eksekusi "php artisan queue:work --queue=scraping"

## Keterangan

Email : eam24maret@gmail.com
Password : ersaazis