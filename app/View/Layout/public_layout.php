<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <link rel="shortcut icon" href="https://img.icons8.com/color-glass/48/000000/alpha.png" type="image/x-icon">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="/">fontrail</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/">comparator</a>
                </li>
                <li>
                    <a href="/fonts">fonts</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <?= $content ?>
    </main>
</body>
</html>