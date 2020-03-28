# E-Shop
Free Laravel e-commerce solution


#### About E-shop
Free Open source E-commerce use Laravel framework 

#### E-shop functions:

<pre>
======= FRONT-END =======

- Multi-language
- Multi-currency
- Shopping cart
- Customer login
- Product attributes: cost price, promotion price, stock..
- CMS content: category, news, content, web page
- Module/Extension: Shipping, payment, discount, ...
- Upload manager: banner, images,..
- SEO support: customer URL
- API module
- Specify fields use for customer, product, order
...

======= ADMIN =======

- Admin roles, permission
- Product manager
- Order management
- Customer management
- Template manager
- Module/Extension manager
- System config: email setting, info shop, maintain status,...
- Backup, restore data
- Report: chart, statistics, export csv, pdf...
...

</pre>

#### Technology
- Core <a href="https://laravel.com">Laravel Framework</a>

#### Requirements:

Version 1.0.0:

> Core laravel framework 6.x Requirements::

```
- PHP >= 7.2
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension
```

#### Installation & configuration:

Step1: Install last version S-cart
```
Download project src
```
Step2: Set writable permissions for the following directories: 

- <code>storage</code>
- <code>vendor</code>
- <code>public/data</code>
- <code>bootstrap/cache</code>


Step3:
```
- Create a new database. Example database name is "eshop"
```

Step4:

```
Access your-domain.com/install.php to install S-cart.
If installing with link "install.php" unsuccessful, you can install it manually below.
```

Step5:

NOTE: Please <b>remove</b> or <b>rename</b> file <code>public/install.php</code> so others cannot access it.

Step6:
- Access to url admin: <b>your-domain/eshop_admin</b>.
- User/pass <code><b>admin</b>/<b>admin</b></code>

OR manual installation:
```
- Step1: Create database, then import file .sql in folder database to database.
- Step2: Rename or delete file public/install.php
- Step3: Copy file .env.example to .env if file .env not exist.
- Step4: Generate API key if APP_KEY is null. 
  Use command "php artisan key:generate"
- Step5: Config value of file .env:
APP_DEBUG=false (Set "false" is security)
DB_HOST=127.0.0.1 (Database host)
DB_PORT=3306 (Database port)
DB_DATABASE=s-cart (Database name)
DB_USERNAME=root (User name use database)
DB_PASSWORD= (Password connect to database)
APP_URL=http://localhost (Your url)
ADMIN_PREFIX=sc_admin (Path to admin)
```
 