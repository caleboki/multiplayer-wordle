<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wordle</title>
    @vite(['resources/css/game.css', 'resources/js/gameApp.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-900">

    <!-- Using AlpineJs -->
    <main x-data = "game"
        @keyup.window="onKeyPress($event.key)">
        <!-- <h1 x-text="'Current row index: ' + currentRowIndex"></h1> -->
        <h1>Wordle</h1>

        <div id="game" >
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

         <!-- Keyboard -->
        <div id="keyboard" @click.stop="$event.target.matches('button') && onKeyPress($event.target.textContent)">

            <template x-for="row in letters">
                <div class="row">
                    <template x-for="key in row">
                        <button
                            class="key"
                            :class="matchingTileForKey(key)?.status"
                            type="button"
                            x-text="key">
                        </button>
                    </template>
                </div>
            </template>

        </div>

        <div id="leaderboard"><a href="/" style="color: white;">View Leaderboard</a></div>

    </main>


</body>
</html>
