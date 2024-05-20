## Pre-Requisitos

- PHP v.8.0.30
- Composer v.2.7.6
- Node v.20.11.0

## Instalación

Los siguientes comandos deberán correrse desde la carpeta raíz del proyecto:
- Descargar el proyecto desde github
- Instalar las dependencias con el comando `composer install`
- En la raíz del proyecto, colocar el archivo de configuración (.env) con la conexión a la base de datos, donde el nombre de la base de datos se sugiere sea `colorin_db`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=colorin_db
DB_USERNAME=root
DB_PASSWORD=
```

- Correr migraciones con el comando `php artisan make:migration create_flights_table`
- Correr seeders (sugerido, pero no necesario): `php artisan db:seed --class=UserSeeder`
- Instalar dependencias de la UI empleando `npm install`
- Compilar los assets empleando el comando `npm run dev`
- Levantar el servidor de la aplicación: `php artisan serve`

### Accesos y Creación de Nuevas Cuentas

Si usted lo desea, una vez que las migraciones se ejecuten correctamente, puede acceder a la aplicación empleando las credenciales:
```
Usuario: admin.colorin
Contraseña: admin123
```

En caso contrario y si usted lo desea, puede crear una nueva cuenta desde la página de registro y posteriormente acceder con el usuario y contraseña que ingresó en el formulario.

> **Nota adicional:** Si usted está empleando un manejador de versiones como Laragon y tiene pre-configurada la herramienta para generar url de prueba, una vez creada la base de datos y corriendo el comando para compilar los assets y las migraciones; al levantar el servidor de Laragon puede acceder a 'http://colorin-test.test/' para acceder al proyecto de manera directa.
