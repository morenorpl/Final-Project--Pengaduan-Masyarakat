<?php
include "function.php";

$total_data = get_data_count('kritik_pelanggan'); // Replace with your table name

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Dashboard Kritik & Saran Client</title>
</head>

<body>

    <body class="flex bg-gray-100 min-h-screen">
        <aside class="hidden sm:flex sm:flex-col">
            <a
                href="dashboard.php"
                class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-paper-fill" viewBox="0 0 16 16">
                    <title>Company Logo</title>
                    <path fill=#fff d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75zM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765M16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516zm-8 3.3 5.693-3.162L0 6.873v6.5Z" />
                </svg>
            </a>
            <div
                class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
                <nav class="flex flex-col mx-4 my-6 space-y-4">
                    <a
                        href="dashboard.php"
                        class="inline-flex items-center justify-center py-3 text-purple-600 bg-white rounded-lg">
                        <span class="sr-only">Dashboard</span>
                        <svg
                            aria-hidden="true"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </a>
                    <a
                        href="index.php"
                        class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                        <span class="sr-only">List</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6 bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg>
                    </a>

                </nav>
                <div
                    class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
                    <button
                        class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                        <span class="sr-only">Settings</span>
                        <svg
                            aria-hidden="true"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </aside>
        <div class="flex-grow text-gray-800">
            <header class="flex items-center h-20 px-6 sm:px-10 bg-white">
                <button
                    class="block sm:hidden relative flex-shrink-0 p-2 mr-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 focus:bg-gray-100 focus:text-gray-800 rounded-full">
                    <span class="sr-only">Menu</span>
                    <svg
                        aria-hidden="true"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        class="h-6 w-6">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
                <div class="relative w-full max-w-md sm:-ml-2">
                    <svg
                        aria-hidden="true"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="absolute h-6 w-6 mt-2.5 ml-2 text-gray-400">
                        <path
                            fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <input
                        type="text"
                        role="search"
                        placeholder="Search..."
                        class="py-2 pl-10 pr-4 w-full border-4 border-transparent placeholder-gray-400 focus:bg-gray-50 rounded-lg" />
                </div>
                <div class="flex flex-shrink-0 items-center ml-auto">
                    <button
                        class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">
                        <span class="sr-only">User Menu</span>

                        <span
                            class="h-12 w-12 ml-2 sm:ml-3 mr-2 bg-gray-100 rounded-full overflow-hidden">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAADACAMAAAB/Pny7AAAAMFBMVEXk5ueutLfY29ypr7Ln6ere4eK8wcPU19nq7O22u77b3t/Hy83R1NazuLvN0NK5vsDaM1loAAAE90lEQVR4nO2d25LbIAxAMYiLwZf//9viOG02jWMbkCNlR2f60N2++AwIEAiqlCAIgiAIgiAIgiAIgiAIgiAIgiAIlwMAStlolz/LD0D9QdUAWO2nlNxKStMQ7Xf6BDsk148m02XM7S+9S8PX+UDQqe82GXunv0kHgp/HbZXVZ/ZfoxP0m0b5Qa/DN+iAnc2hS44hp9jbgBq6My7LiDBQf+wBYN05lbVxLOfGAT2ed8k2nab+4vfA2S72sOHb1aYik5WJZ0+DVOHC1abOhaVNjpda2MUN+GqXrvO82gbi3lrsANMxm28K5soNG0f9+U9MLS7ZZqIWeACxzSXbRDYdDZo62U2m5yIDQ6tLthmY2ECzSmbkIRMao/9OCtQiCygNk5uG2mMBcBqGR9NAw9z/xExt0rgoe4Z+QAsOy8U4chl7vEd2lj4SuzSkMa9Q97PKXHkTk4hlLFrIZJwldQGPFzJ53qRNOVFDhjpoICFN/zeoczRcmUQaNHFGdMkrGkoZiJjxv0ybhEEDHmuVeYdWBtel079JhnKiQZ5mOuPpXERGZESmVAZ7nqEdmn+TzIkqmRJG0sOAiJlo5oUm6ZZGSXXJMYY4b0bOZ0hdoKYo470MbUkADKjDGfEZOupwRpqbLSAOZ8Qho1T4TTuaoPGChngPcAFvf4Z4llGo/Yz+HBAsVj+jXZjdbbDGM/qDM4zCmTv04a/QTjVnDi556YzRNIZFw+SmOVX8f0BPPpT9BaGqiUe7KIwaLUM/xzxoXQawqZ1baF2hUZczPNOWcTKqN73RsEQjz2NeqK9uoN6T2aL2eNOQnsq+o7KCfqTckn0LqCoZBgv/LaCi9HTke8ExFMaN6TnfpC0sP+OQj+0Aw/nG6akr/w6BmE7eb0xMQ/8noLw7oeM839D/CVjvzJ6OMW5gdjNrB7D6bWczWUVznPT3sNNsXton/2Yevs3kRo6edHtD4x9j+pJI2QRCUNYP0zQN3qrwFa8z7AEPqD+lltvjOa/kX97/8StYGsDaGHPfSsnN6ysn60AwjrNzKXc4HaNir7SIRJ0tXL8+mvMyOt9/O84pTV5bxbXvLY8ZDSnlptiQ2JptlueBJm/5+QSIw9oehxpPSksbTV4xGuWWt4xcwxF6Fso+1BYLEFTq2w/PRqeB2gfAox3Qjom0u4E6m7ucwzi6FMemwng/tjE9zZmT3c9Zqn3GvIj7qBAofY3KqjN9NEl4n3rh6MwfS0QhpqLnpar4zBYBqAnjPPaQ8QMjW9C4F7N26NO10w6EhFyVvctsL1wUBPuxZrkzXWaDfY3hBCZdNQ6g1jCftbmkCLXo6UJMmxH/GgpEGpfugkvCoHsql1tVLWZXA3/p8uXYBnEYIBjG/rPBe9uV3CWDZRMYuHQdTtxg1pS3gFFbj31LvhqMyzVEc+UW7dsDFGuYN7SWpGO8kIdG4wuVYKkFnmi7YAMfyZDPYxrKuQKjgFlpeAYRpS4elfr6Z7x32BCp3FADTf3hW7i6pgmf3r04R9XUyWGtvEVVwR3a9StsKpoG/REGNCrWAZiP/eHSl8+cyI99YVKcC+Be9Eel4u4AnzTmlcIhAPvZElRKdwVZ5TH/U/x0ILv18k8KH6lllPlvUJbWsNmS2aYsaEBzbpjSS2qetUzhigbrEfaLGIuGM9aDWaZIxhneFP2XYlHzpsRFEARBEARBoOAPhEhJogo6DqQAAAAASUVORK5CYII="
                                alt="user profile photo"
                                class="h-full w-full object-cover" />
                        </span>
                        <svg
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="hidden sm:block h-6 w-6 text-gray-300">
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="border-l pl-3 ml-3 space-x-1">
                        <button
                            class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
                            <span class="sr-only">Notifications</span>
                            <span
                                class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full"></span>
                            <span
                                class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full animate-ping"></span>
                            <svg
                                aria-hidden="true"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="h-6 w-6">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                        <a href="login.php">
                            <button
                                class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
                                <span class="sr-only">Log out</span>
                                <svg
                                    aria-hidden="true"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="h-6 w-6">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </header>

            <!-- MAIN BOARD -->
            <main class="p-6 sm:p-10 space-y-6">
                <div
                    class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                    <div class="mr-6">
                        <h1 class="text-4xl font-semibold mb-2">Dashboard</h1>
                        <h2 class="text-gray-600 ml-0.5">Report: Kritik & Saran dari Para Klien</h2>
                    </div>
                    <div class="flex flex-wrap items-start justify-end -mb-3">
                        <a href="input.php">
                            <button
                                class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md ml-6 mb-3">
                                <svg
                                    aria-hidden="true"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create new report
                            </button>
                        </a>
                    </div>
                </div>
                <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6 bi bi-list-ul" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold"><?php echo $total_data; ?></span>
                            <span class="block text-gray-500">Reports</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-gray-100 border-2 border-dashed rounded-lg">

                    </div>
                    <div class="flex items-center p-8 bg-gray-100 border-2 border-dashed rounded-lg">

                    </div>
                    <div class="flex items-center p-8 bg-gray-100 border-2 border-dashed rounded-lg">

                    </div>

                </section>
                <section
                    class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                    <div class="flex flex-col md:col-span-2 md:row-span-2 bbg-gray-100 border-2 border-dashed  rounded-lg">

                    </div>
                    <div class="flex items-center p-8 bg-gray-100 border-2 border-dashed rounded-lg">

                    </div>
                    <div class="flex items-center p-8 bg-gray-100 border-2 border-dashed rounded-lg">

                    </div>
                    <div class="row-span-3 bg-gray-100 border-2 border-dashed rounded-lg">
                        
                    </div>
                    <div class="flex flex-col row-span-3 bg-gray-100 border-2 border-dashed rounded-lg">
                        
                    </div>
                </section>
            </main>
        </div>
    </body>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>