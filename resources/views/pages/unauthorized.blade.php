<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>401 - Unauthorized</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Gabarito", sans-serif;, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f7fafc;
        }
        .title {
            font-size: 1.5rem;
            font-weight: 500;
            text-transform: uppercase;
            margin-bottom: 1rem;
            color: gray;
        }
        .subtitle {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: gray;
            font-weight: 400
            word-wrap: break-word;
        }
        .link {
            text-decoration: none;
            color: gray;
            cursor: pointer;
            font-size: 1.2rem;
        }
        .link:hover {
            text-decoration: underline;
            color: #3182ce;
            cursor: pointer;
        }
        @media screen and (max-width: 600px) {
            .subtitle {
                padding: 0 6px;
                text-align: center
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">401 | UNAUTHORIZED</div>
        <div class="subtitle">You dont have access permission to access this page.</div>
        <a href="/" class="link">Go back to homepage</a>
    </div>
</body>
</html>
