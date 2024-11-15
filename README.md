### Source

> https://youtu.be/_MZ1B5F2PFc?si=uJ_oGuAcpoya-GUB&t=2648

### This Git

> https://github.com/samedan/2411_invoices_vue_laravel

### DBB

## Counters

> php artisan make:model Counter -m
> php artisan make:factory CounterFactory
> /app/database/factories/CounterFactory
> /app/database/seeders/DatabaseSeeder
> php artisan db:seed

## Products

> php artisan make:model Product -mc

> php artisan make:factory ProductFactory

## Customers

> php artisan make:model Customer -mc

> php artisan make:factory CustomerFactory

## Invoices

> php artisan make:model Invoice -mc
> php artisan make:factory InvoiceFactory

## InvoiceItems

> php artisan make:model InvoiceItem -m
> php artisan make:factory InvoiceItemFactory

### Frontend

> npm install vue-loader@next vue@3.2.20 vue-router@next
> npm install @vitejs/plugin-vue --force

# Template css

> https://github.com/share-tutorials-dev/invoice-html-css

### Show Invoices

> ![Invoices](https://github.com/samedan/2411_invoices_vue_laravel/blob/main/public/images/printscreen1.jpg)

> InvoiceController : $invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();
> /resources/js/components/invoices/index.vue -> getInvoices()
> Invoice.php : customer(){ return $this->belongsTo(Customer::class);}
