# Wordle Game

## Project Setup

### Build Docker containers (Laravel Sails)

1. Clone this repo:
```
git clone https://github.com/caleboki/wordle.git yourproject
cd yourproject
```

2. Update composer ```composer update```

3. Save the ```.env.example``` file to ```.env```

4. Build and run containers: ```./vendor/bin/sail up```

5. In another terminal, run 
    * ```./vendor/bin/sail php artisan key:generate```
    * ```./vendor/bin/sail npm install```
    * ```./vendor/bin/sail npm run dev```

6. Visit ```http://localhost:80``` on your browser
