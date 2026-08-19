# Vista Verde Country Club

Sitio web del Vista Verde Country Club (Golf & Country Club) construido con Laravel 11 + Livewire 3 + Filament 3 + Vite.

## 📦 Entrega / Instalación rápida

### Requisitos
- PHP 8.2+ (con extensiones: pdo_mysql, mbstring, openssl, xml, ctype, json, bcmath, fileinfo, gd)
- Composer
- Node.js 18+ / npm
- MySQL 8.0+ (o MariaDB 10.6+)
- XAMPP (para MySQL + Apache si se desea, aunque `php artisan serve` basta)

### Pasos para levantar el proyecto clonado
```bash
# 1. Dependencias PHP
composer install

# 2. Configuración de entorno
copy .env.example .env
php artisan key:generate

# 3. Edita .env con tus credenciales de BD (DB_DATABASE=vista_verde, DB_USERNAME=root, DB_PASSWORD=, etc.)

# 4. Importar el snapshot exacto de la base de datos (estructura + datos + usuario admin + rutas de imágenes)
#    Requiere que el servicio MySQL de XAMPP esté corriendo.
mysql -u root vista_verde < database/snapshots/vista_verde.sql
#   Si usas contraseña en root: mysql -u root -p vista_verde < database/snapshots/vista_verde.sql

# 5. Enlace de almacenamiento (hace accesibles las imágenes subidas vía /storage/...)
php artisan storage:link
#   En Windows, si el symlink falla por permisos, usar el fallback:
#   xcopy /E /I /Y storage\app\public\* public\storage\

# 6. Frontend
npm install && npm run build

# 6. Servir
php artisan serve
#   Abre http://127.0.0.1:8000 (o http://localhost:8000)
```

### Credenciales de acceso (admin)
- **Email:** `admin2@vistaverde.com`
- **Password:** `12345678`
- Panel admin: `http://127.0.0.1:8000/admin` (Filament)

### Regenerar el snapshot (cuando cambien contenidos/imágenes en producción)
```bash
# Exportar la BD actual (desde la raíz del proyecto)
"C:\xampp\mysql\bin\mysqldump.exe" -u root --databases vista_verde --routines --triggers --result-file=database/snapshots/vista_verde.sql
# Si root tiene contraseña: ... -u root -p ...
# Revisa/añade los nuevos medios en storage/app/public/ y haz commit.
git add storage/app/public database/snapshots/vista_verde.sql
git commit -m "chore: actualizar snapshot y medios"
```

---

## Sobre Laravel

Laravel is a web application framework with expressive, elegant syntax...

*(resto del README original de Laravel)*