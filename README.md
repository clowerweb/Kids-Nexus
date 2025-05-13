# Kids Nexus

## Installation

1. `composer install`
2. `docker-compose up -d`
3. Go to `http://localhost:8081` (PHPMyAdmin) and import `App/Database/schema.sql`
4. Add `kidsnexus.local` to your hosts file, pointing to `127.0.0.1`

You can now access the site at `http://kidsnexus.local` and the API at `http://kidsnexus.local/api`!

## Development

1. `docker-compose up -d`
2. Go to `http://kidsnexus.local`
3. The back-end API is available at `http://kidsnexus.local/api`

## Deployment

1. `docker exec -it kids_nexus_node_dev sh -c "npm run build"`
2. Upload the `/api`, `/App` and `/public` directories to your server
3. Ensure that the `App/Database/schema.sql` file is imported into your live DB server
4. Follow the `/.htaccess` or `/nginx.conf` files to configure your server, depending on if you use nginx or Apache
