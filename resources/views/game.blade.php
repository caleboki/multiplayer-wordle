<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle</title>
    @vite(['resources/css/game.css', 'resources/js/gameApp.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-900">

    <!-- Using AlpineJs -->

    <main x-data = "game"
        @keyup.window="onKeyPress($event.key)">

        <h2 aria-label="Wordle">
            <!-- <img src="/images/logo.svg" alt=""> -->
        </h2>

        <div id="game" >
            <!-- <input type="text" x-model="this.guessesAllowed"> -->
            <template x-for="(row, index) in board">
                <div class="row" :class="{'current' : currentRowIndex === index, 'invalid' : currentRowIndex === index && errors}">

                    <template x-for="tile in row">
                        <div class="tile" :class="tile.status" x-text="tile.letter">

                        </div>
                    </template>

                </div>
            </template>
        </div>

        <output x-text="message"></output>

    </main>
</body>
</html>
