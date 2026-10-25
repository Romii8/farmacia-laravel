# Farmacia Virtual 

Aplicación web desarrollada como proyecto académico para la consulta y compra de medicamentos. Utiliza Laravel para la gestión de la aplicación e integra una base de datos y servicios externos.

## Funcionalidades

- Autenticación y gestión de usuarios.
- Consulta y gestión de medicamentos.
- Integración con un servicio de inteligencia artificial.
- Envío de correos electrónicos.

## Tecnologías utilizadas

- **Backend:** PHP y Laravel.
- **Frontend:** Blade, HTML y CSS.
- **Estilos e interactividad:** Tailwind CSS y Alpine.js.
- **Base de datos:** SQL.
- **Herramientas de desarrollo:** Composer, Vite y npm.

## Requisitos

- PHP 8.2 o una versión compatible con las dependencias del proyecto.
- Composer.
- Node.js y npm para instalar y compilar los recursos del frontend.
- Un sistema gestor de bases de datos compatible con el archivo SQL incluido.

## Instalación y configuración

### 1. Clonar el repositorio

```bash
git clone https://github.com/Romii8/farmacia-laravel.git
cd farmacia-laravel
```

### 2. Instalar las dependencias

```bash
composer install
npm install
```

### 3. Configurar el entorno

Crear un archivo `.env` a partir de `.env.example`:

```bash
cp .env.example .env
```

Generar la clave de la aplicación:

```bash
php artisan key:generate
```

### 4. Configurar la base de datos

El repositorio incluye un archivo SQL de respaldo en `database/sql/farmacia_bd.sql`.

1. Crear una base de datos local.
2. Importar el archivo SQL mediante una herramienta compatible, como phpMyAdmin.
3. Configurar en `.env` los datos de conexión correspondientes a la base de datos creada.

El respaldo debe importarse de acuerdo con su estructura. No ejecutar migraciones que creen las mismas tablas sin verificar previamente su compatibilidad con el SQL.

### 5. Configurar los servicios externos

Las integraciones de inteligencia artificial y correo electrónico requieren sus respectivas credenciales y configuraciones.

Estas deben añadirse únicamente al archivo `.env` local. El repositorio no incluye claves de API, contraseñas de correo ni credenciales privadas.

### 6. Compilar los recursos del frontend

```bash
npm run build
```

### 7. Iniciar la aplicación

```bash
php artisan serve
```

Abrir en el navegador la dirección local que indique Laravel en la terminal.

## Seguridad

- No publicar archivos `.env` ni credenciales privadas.
- Utilizar claves propias para los servicios externos que se deseen habilitar.
- Emplear datos de prueba y evitar información personal real al trabajar con la base de datos.

## Estado del proyecto

Proyecto académico disponible para consulta de su código fuente. Para ejecutarlo se requiere configurar el entorno local, la base de datos y los servicios externos correspondientes.

## Autores

Romina Andrade, Angie Reyes, Robert Romero, Demi Tinajero
Estudiantes de Ingeniería en Ciencias de la Computación.

