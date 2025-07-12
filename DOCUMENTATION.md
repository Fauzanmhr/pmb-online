# PMB Online - Penerimaan Mahasiswa Baru

## Deskripsi
Aplikasi PMB Online adalah sistem penerimaan mahasiswa baru yang dikembangkan menggunakan framework Laravel. Aplikasi ini menyediakan fitur lengkap untuk manajemen pendaftaran mahasiswa dengan sistem role-based access control.

## Fitur Utama

### 1. Authentication System
- **Login/Register**: Sistem autentikasi untuk admin dan mahasiswa
- **Role-based Access**: Pembagian akses berdasarkan role (Admin/Student)
- **Secure Password**: Hash password menggunakan bcrypt

### 2. Dashboard
- **Admin Dashboard**: 
  - Statistik total pendaftar
  - Grafik status pendaftaran
  - Menu navigasi lengkap
- **Student Dashboard**:
  - Status pendaftaran pribadi
  - Akses ke form pendaftaran

### 3. Manajemen Pendaftaran
- **Create**: Form pendaftaran lengkap dengan validasi
- **Read**: Daftar dan detail pendaftaran
- **Update**: Edit data pendaftaran
- **Delete**: Hapus data pendaftaran (Admin only)
- **Approve/Reject**: Sistem persetujuan pendaftaran

### 4. Manajemen User (Admin)
- **User Management**: CRUD operasi untuk user
- **Role Assignment**: Pengaturan role user

### 5. Export PDF
- **PDF Export**: Export data pendaftaran ke format PDF
- **Professional Layout**: Template PDF yang rapi dan profesional

### 6. File Upload
- **Photo Upload**: Upload foto mahasiswa
- **File Validation**: Validasi format dan ukuran file
- **Storage Management**: Pengelolaan file dengan Laravel Storage

## Teknologi yang Digunakan

### Backend
- **Framework**: Laravel 12.0
- **PHP**: 8.2+
- **Database**: MySQL/MariaDB
- **Authentication**: Laravel Sanctum
- **PDF Generator**: DomPDF (barryvdh/laravel-dompdf)

### Frontend
- **CSS Framework**: Bootstrap 5.3.0
- **Icons**: Bootstrap Icons
- **JavaScript**: Vanilla JavaScript untuk validasi dan interaksi
- **Responsive Design**: Mobile-friendly interface

### Database
- **ORM**: Eloquent
- **Migrations**: Database versioning
- **Seeders**: Data awal untuk testing
- **Relationships**: Foreign key constraints

## Struktur Database

### Tables
1. **users**: Data user (admin/student)
2. **pendaftaran**: Data pendaftaran mahasiswa
3. **provinsi**: Master data provinsi
4. **kabupaten**: Master data kabupaten/kota
5. **agama**: Master data agama

### Relationships
- **User** has one **Pendaftaran**
- **Pendaftaran** belongs to **Provinsi**
- **Pendaftaran** belongs to **Kabupaten**
- **Pendaftaran** belongs to **Agama**

## Instalasi dan Setup

### 1. Requirements
```bash
PHP >= 8.2
Composer
Node.js & NPM
MySQL/MariaDB
```

### 2. Installation Steps
```bash
# Clone repository
git clone [repository-url]
cd pmb-online

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Storage link
php artisan storage:link

# Compile assets
npm run build

# Start server
php artisan serve
```

### 3. Database Configuration
Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pmb_online
DB_USERNAME=root
DB_PASSWORD=
```

## Penggunaan Aplikasi

### 1. Login Credentials
**Admin:**
- Email: admin@pmb.com
- Password: password

**Test Student:**
- Email: student@pmb.com
- Password: password

### 2. Workflow Pendaftaran
1. **Student Registration**: Mahasiswa mendaftar akun
2. **Fill Application**: Mengisi form pendaftaran lengkap
3. **Admin Review**: Admin mereview aplikasi
4. **Approval/Rejection**: Admin menyetujui atau menolak
5. **PDF Export**: Generate dokumen pendaftaran

### 3. Admin Functions
- **User Management**: Kelola semua user
- **Application Review**: Review semua pendaftaran
- **Status Management**: Ubah status pendaftaran
- **Reports**: Export data ke PDF

## Fitur Validasi

### 1. Form Validation
- **Required Fields**: Validasi field wajib
- **Email Format**: Validasi format email
- **Phone Number**: Validasi nomor telepon
- **File Upload**: Validasi format dan ukuran file

### 2. Business Rules
- **Unique Email**: Email unik per pendaftaran
- **Role-based Access**: Akses berdasarkan role
- **Owner Verification**: User hanya bisa edit data sendiri

## Security Features

### 1. Authentication
- **Password Hashing**: Bcrypt password hashing
- **Session Management**: Secure session handling
- **CSRF Protection**: Cross-site request forgery protection

### 2. Authorization
- **Middleware**: Role-based middleware
- **Gate Policies**: Fine-grained permissions
- **Input Validation**: Comprehensive input validation

## API Endpoints

### 1. Web Routes
- **GET** `/` - Landing page
- **GET** `/login` - Login form
- **POST** `/login` - Login process
- **GET** `/register` - Register form
- **POST** `/register` - Register process
- **GET** `/dashboard` - Dashboard
- **Resource** `/pendaftaran` - Pendaftaran CRUD
- **Resource** `/admin/users` - User management

### 2. API Routes
- **GET** `/api/kabupaten/{provinsi_kode}` - Get kabupaten by provinsi

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── PendaftaranController.php
│   │   ├── UserController.php
│   │   └── ApiController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── User.php
│   ├── Pendaftaran.php
│   ├── Provinsi.php
│   ├── Kabupaten.php
│   └── Agama.php
database/
├── migrations/
├── seeders/
└── factories/
resources/
├── views/
│   ├── layouts/
│   ├── auth/
│   ├── dashboard/
│   ├── pendaftaran/
│   └── admin/
├── css/
└── js/
```

## Testing

### 1. Manual Testing
- Test semua form submissions
- Test file uploads
- Test PDF generation
- Test role-based access

### 2. Test Scenarios
- **Registration Flow**: Complete registration process
- **Admin Functions**: Test all admin capabilities
- **Validation**: Test form validations
- **Security**: Test unauthorized access

## Deployment

### 1. Production Setup
```bash
# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set environment
APP_ENV=production
APP_DEBUG=false
```

### 2. Server Requirements
- **Web Server**: Apache/Nginx
- **PHP**: 8.2+ with required extensions
- **Database**: MySQL 8.0+
- **Storage**: File storage for uploads

## Maintenance

### 1. Regular Tasks
- **Database Backup**: Regular database backups
- **Log Monitoring**: Monitor application logs
- **Security Updates**: Keep dependencies updated

### 2. Monitoring
- **Error Logs**: Monitor Laravel logs
- **Performance**: Database query optimization
- **Storage**: Monitor file storage usage

## Troubleshooting

### 1. Common Issues
- **Storage Link**: Run `php artisan storage:link`
- **Cache Issues**: Clear cache with `php artisan cache:clear`
- **Permission**: Set proper file permissions

### 2. Debug Mode
Enable debug mode in `.env`:
```env
APP_DEBUG=true
```

## Support

Untuk support dan dokumentasi lebih lanjut, hubungi developer atau check repository documentation.

## License

This project is open-sourced software licensed under the MIT license.
