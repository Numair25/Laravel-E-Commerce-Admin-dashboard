# Max Cycles - Laravel E-commerce Website

A complete Laravel-based e-commerce website for Max Cycles, a bicycle store located in Aland, Karnataka, India. This project includes both an admin panel and a public website with full CRUD functionality.

## Features

### Admin Panel
- **Authentication**: Secure login with Laravel Breeze
- **Dashboard**: Overview with statistics and recent cycles
- **Cycle Management**: Full CRUD operations with image uploads
- **Category Management**: Organize cycles by categories
- **Payment Gateway Management**: Configure payment options
- **SEO Management**: Meta titles, descriptions, and keywords
- **Publish/Unpublish**: Control cycle visibility
- **Image Management**: Multiple image uploads with preview
- **Session Management**: Secure logout and session timeout

### Public Website
- **Responsive Design**: Mobile-friendly interface with Tailwind CSS
- **SEO Optimized**: Clean URLs, meta tags, and sitemap
- **Cycle Browsing**: Filter, search, and sort functionality
- **Cycle Details**: Detailed product pages with image galleries
- **Contact Form**: Customer inquiry system
- **About Page**: Company information and story
- **Category Pages**: Organized cycle browsing

## Technology Stack

- **Backend**: Laravel 11.x
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: SQLite (can be changed to MySQL/PostgreSQL)
- **Authentication**: Laravel Breeze
- **Image Handling**: Spatie Media Library
- **SEO**: Custom meta management and sitemap generation
- **Slugs**: Spatie Laravel Sluggable

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and NPM (for frontend assets)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd max-cycles
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Storage setup**
   ```bash
   php artisan storage:link
   ```

7. **Build frontend assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

## Default Credentials

### Admin Access
- **URL**: `/admin/login`
- **Email**: `admin@maxcycles.com`
- **Password**: `Admin@12345`

**Important**: Change the default password after first login for security.

## Project Structure

```
max-cycles/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Admin panel controllers
│   │   └── Frontend/        # Public website controllers
│   ├── Models/              # Eloquent models
│   └── Providers/           # Service providers
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   └── views/
│       ├── admin/          # Admin panel views
│       ├── frontend/       # Public website views
│       └── layouts/        # Layout templates
├── routes/
│   └── web.php            # Application routes
└── public/                # Public assets
```

## Key Features Explained

### Admin Panel Features
- **Cycle Management**: Add, edit, delete cycles with multiple images
- **Category Management**: Organize cycles into categories
- **SEO Fields**: Meta titles, descriptions for better search visibility
- **Publish Control**: Toggle cycle visibility on the public website
- **Image Preview**: Visual management of cycle images

### Public Website Features
- **Responsive Design**: Works on all devices
- **Advanced Filtering**: Filter by category, type, price range
- **Search Functionality**: Search cycles by name, brand, description
- **SEO Optimization**: Clean URLs, meta tags, structured data
- **Contact System**: Customer inquiry form with validation

## Customization

### Adding New Cycle Types
1. Update the `$fillable` array in the Cycle model
2. Add validation rules in CycleController
3. Update the frontend filter options

### Modifying Categories
1. Edit the CategorySeeder for new categories
2. Update the frontend category display
3. Adjust the admin category management

### SEO Optimization
- Update meta titles and descriptions in cycle management
- Modify the sitemap generation in SitemapController
- Customize robots.txt for search engine crawling

## Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Configure database for production
3. Set up proper file permissions
4. Configure web server (Apache/Nginx)
5. Set up SSL certificate
6. Configure backup system

### Environment Variables
```env
APP_NAME="Max Cycles"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=max_cycles
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Security Features

- CSRF protection on all forms
- Input validation and sanitization
- Secure file upload handling
- Authentication middleware
- Session management
- SQL injection prevention

## Performance Optimization

- Database indexing on frequently queried fields
- Image optimization with Intervention Image
- Caching strategies for static content
- Lazy loading for images
- Minified CSS and JavaScript

## Support

For support and questions:
- Email: support@maxcycles.com
- Phone: +91 XXXXXXXXXX
- Address: Aland, Karnataka, India

## License

This project is proprietary software developed for Max Cycles. All rights reserved.

## Contributing

This is a private project for Max Cycles. For any modifications or customizations, please contact the development team.

---

**Max Cycles** - Your trusted partner for premium bicycles in Aland, Karnataka.
