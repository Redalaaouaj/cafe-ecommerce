<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-100">
    <?php include 'include/nav.php';
    if (isset($_POST['connecter'])) {
        if (empty($_POST['login']) || empty($_POST['password'])) {
    ?><div role="alert" class="m-4 rounded border-s-4 border-red-500 bg-red-200 p-4">
                <div class="flex items-center gap-2 text-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                    </svg>

                    <strong class="block font-medium"> Veuillez remplir tous les champs </strong>
                </div>
            </div><?php
                } else {
                    require_once 'include/database.php';
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $created_at = date('Y-m-d');
                    $sqlState = $pdo->prepare("SELECT * FROM utilisateur WHERE login = ? AND password = ? LIMIT 1");
                    $sqlState->execute([$login, $password]);
                    if ($sqlState->rowCount() > 0) {
                        
                        header('location: index.php');
                    } else {
                    ?><div role="alert" class="m-4 rounded border-s-4 border-red-500 bg-red-200 p-4">
                    <div class="flex items-center gap-2 text-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>

                        <strong class="block font-medium"> Les données sons incorrectes ! </strong>
                    </div>
                </div> <?php
                ;
                    }
                }
            }
                        ?>
    <form method="post" class="m-12 text-center w-full space-y-5">
        <div>
            <label for="login" class="block font-medium text-gray-700"> Login </label>
            <input type="email" id="login" name="login" placeholder="nom@gmail.com" class="mt-1 p-2 w-60 rounded-md border border-gray-800 shadow-lg sm:text-sm focus:outline-none" />
        </div>
        <div>
            <label for="password" class="block font-medium text-gray-700"> Password </label>
            <input type="password" id="password" name="password" placeholder="........" class="mt-1 p-2 w-60 rounded-md border border-gray-800 shadow-lg sm:text-sm focus:outline-none" />
        </div>
        <input type="submit" name="connecter" value="Login" class="p-3 tracking-widest bg-blue-900 hover:bg-blue-700 rounded-lg text-white">

    </form>
</body>

</html>