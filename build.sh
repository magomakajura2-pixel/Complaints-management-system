#!/usr/bin/env bash
set -e

echo "Installing dependencies..."
composer install --no-dev --no-interaction --optimize-autoloader --no-progress

echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force

echo "Fixing PostgreSQL sequences..."
php artisan tinker --execute="
\Illuminate\Support\Facades\DB::select(\"SELECT setval('admins_id_seq', (SELECT GREATEST(COALESCE(MAX(id),0),1) FROM admins))\");
\Illuminate\Support\Facades\DB::select(\"SELECT setval('users_id_seq', (SELECT GREATEST(COALESCE(MAX(id),0),1) FROM users))\");
\Illuminate\Support\Facades\DB::select(\"SELECT setval('categories_id_seq', (SELECT GREATEST(COALESCE(MAX(id),0),1) FROM categories))\");
\Illuminate\Support\Facades\DB::select(\"SELECT setval('subcategories_id_seq', (SELECT GREATEST(COALESCE(MAX(id),0),1) FROM subcategories))\");
\Illuminate\Support\Facades\DB::select(\"SELECT setval('states_id_seq', (SELECT GREATEST(COALESCE(MAX(id),0),1) FROM states))\");
\Illuminate\Support\Facades\DB::select(\"SELECT setval('complaint_remarks_id_seq', (SELECT GREATEST(COALESCE(MAX(id),0),1) FROM complaint_remarks))\");
echo 'Sequences reset';
" 2>&1 || echo "Sequence fix skipped (may not exist yet)"

echo "Creating storage directories..."
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
mkdir -p bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "Build complete!"
