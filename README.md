## Clonar el proyecto
`git clone https://github.com/AntonyS67/formulario_laravel.git`

## Instalar dependencias
`composer install`

## Crear un archivo .env
En la raiz del proyecto crear un archivo .env, puede copiar los datos que estan en archivo .env.example
y cambiar:
```
    DB_DATABASE=tu_based_de_datos
    DB_USERNAME=usuario_de_bd
    DB_PASSWORD=contraseña o dejarlo vacio
```

## Ejecutar Migraciones
`php artisan migrate`

## Definir tambien las credenciales del correo electronico en el archivo .env
Esto es para que al crear el registro se envie a su correo un mensaje de registro exitoso
```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=tu_correo
    MAIL_PASSWORD=contraseña_correo
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=tu_correo
    MAIL_FROM_NAME="${APP_NAME}"
```
## Usar el proyecto
