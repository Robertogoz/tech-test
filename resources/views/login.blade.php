<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
    <body>
        <div style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column">
            <form action="http://localhost:8000/api/login" method="post">
                <h1>Login</h1>
                <section>
                    Email: <input type="email" name="email">
                </section>
                
                <section>
                    Senha: <input type="password" name="password">
                </section>

                <div style="margin-top: 20px">
                    <input type="submit" value="Enviar">
                    <a href="/register">Sign Up</a>
                </div>
            </form>
        </div>
    </body>
</html>